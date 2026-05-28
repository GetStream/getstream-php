<?php

declare(strict_types=1);

namespace GetStream\Tests\Exceptions;

use GetStream\Exceptions\StreamApiException;
use GetStream\Exceptions\StreamException;
use GetStream\Exceptions\StreamRateLimitException;
use GetStream\Exceptions\StreamTaskException;
use GetStream\Exceptions\StreamTransportException;
use GetStream\Http\GuzzleHttpClient;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use PHPUnit\Framework\TestCase;

/**
 * Covers the CHA-2958 error-handling spec for getstream-php:
 *  - structured field exposure on StreamApiException (§5.1)
 *  - StreamRateLimitException + Retry-After parsing (§5.2, §7)
 *  - StreamTransportException + errorType enum + cause chain (§5.3, §6.4)
 *  - cause-chain preservation on every wrap point (§6.4)
 *  - preservation of PHP's auto-retry-on-429 middleware. A standardized retry
 *    policy across all 6 SDKs is owned by CHA-2959 (Rate limits and retry).
 */
class ErrorHandlingTest extends TestCase
{
    /**
     * @param array<int, \GuzzleHttp\Psr7\Response|\Throwable> $responses
     * @param array<int, mixed> $capturedHistory
     */
    private function makeClient(array $responses, array &$capturedHistory = []): GuzzleHttpClient
    {
        $mock = new MockHandler($responses);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($capturedHistory));
        // maxRetries=0 keeps the no-retry tests fast and isolates the assertion
        // surface. Retry behavior is covered by its own test below.
        return new GuzzleHttpClient(['handler' => $stack], 0);
    }

    /** @test */
    public function streamApiExceptionExposesCanonicalFields(): void
    {
        $body = json_encode([
            'code' => 4,
            'message' => 'channel_id is required',
            'exception_fields' => ['channel_id' => 'is required'],
            'unrecoverable' => false,
            'more_info' => 'https://stream.io/docs/errors/4',
            'details' => ['hint' => 'pass channel_id in body'],
        ]);

        $client = $this->makeClient([
            new GuzzleResponse(400, ['Content-Type' => 'application/json'], $body),
        ]);

        try {
            $client->request('POST', 'https://example.invalid/api/v2/channels');
            self::fail('expected StreamApiException');
        } catch (StreamRateLimitException $e) {
            self::fail('rate-limit subclass should not fire for status 400');
        } catch (StreamApiException $e) {
            self::assertSame(400, $e->getStatusCode());
            // getCode() preserves the pre-CHA-2958 behavior (HTTP status).
            // The canonical APIError.code is exposed via getApiErrorCode().
            self::assertSame(400, $e->getCode());
            self::assertSame(4, $e->getApiErrorCode());
            self::assertSame('channel_id is required', $e->getMessage());
            self::assertSame(['channel_id' => 'is required'], $e->getExceptionFields());
            self::assertFalse($e->isUnrecoverable());
            self::assertSame($body, $e->getRawResponseBody());
            self::assertSame('https://stream.io/docs/errors/4', $e->getMoreInfo());
            self::assertSame(['hint' => 'pass channel_id in body'], $e->getDetails());
        }
    }

    /** @test */
    public function streamApiExceptionExposesUnrecoverableFlag(): void
    {
        $body = json_encode([
            'code' => 17,
            'message' => 'not allowed',
            'unrecoverable' => true,
        ]);

        $client = $this->makeClient([
            new GuzzleResponse(403, ['Content-Type' => 'application/json'], $body),
        ]);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/forbidden');
            self::fail('expected StreamApiException');
        } catch (StreamApiException $e) {
            self::assertTrue($e->isUnrecoverable());
            self::assertSame([], $e->getExceptionFields(), 'exception_fields defaults to empty map');
        }
    }

    /** @test */
    public function unparseableErrorResponseFallsBackToSentinelMessage(): void
    {
        $client = $this->makeClient([
            new GuzzleResponse(500, ['Content-Type' => 'application/json'], '<<<not json>>>'),
        ]);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/boom');
            self::fail('expected StreamApiException');
        } catch (StreamApiException $e) {
            self::assertSame(500, $e->getStatusCode());
            self::assertSame(500, $e->getCode(), 'getCode() returns HTTP status (back-compat)');
            self::assertSame(0, $e->getApiErrorCode(), 'APIError.code is 0 on unparseable body');
            self::assertSame('failed to parse error response', $e->getMessage());
            self::assertSame('<<<not json>>>', $e->getRawResponseBody());
            self::assertNotNull($e->getPrevious(), 'cause chain must point to the JSON parse error');
            self::assertInstanceOf(\JsonException::class, $e->getPrevious());
        }
    }

    /** @test */
    public function rateLimitExceptionParsesIntegerRetryAfter(): void
    {
        $body = json_encode(['code' => 9, 'message' => 'rate limited']);

        $client = $this->makeClient([
            new GuzzleResponse(429, [
                'Content-Type' => 'application/json',
                'Retry-After' => '12',
            ], $body),
        ]);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/throttled');
            self::fail('expected StreamRateLimitException');
        } catch (StreamRateLimitException $e) {
            self::assertSame(429, $e->getStatusCode());
            self::assertSame(12, $e->getRetryAfter());
            self::assertInstanceOf(StreamApiException::class, $e, 'rate-limit must inherit from API exception');
        }
    }

    /** @test */
    public function rateLimitExceptionParsesHttpDateRetryAfter(): void
    {
        $body = json_encode(['code' => 9, 'message' => 'rate limited']);
        $httpDate = gmdate('D, d M Y H:i:s \G\M\T', time() + 7);

        $client = $this->makeClient([
            new GuzzleResponse(429, [
                'Content-Type' => 'application/json',
                'Retry-After' => $httpDate,
            ], $body),
        ]);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/throttled');
            self::fail('expected StreamRateLimitException');
        } catch (StreamRateLimitException $e) {
            $retryAfter = $e->getRetryAfter();
            self::assertNotNull($retryAfter, 'HTTP-date Retry-After must parse');
            self::assertGreaterThanOrEqual(5, $retryAfter);
            self::assertLessThanOrEqual(8, $retryAfter);
        }
    }

    /** @test */
    public function rateLimitExceptionRetryAfterIsNullWhenHeaderMissing(): void
    {
        $body = json_encode(['code' => 9, 'message' => 'rate limited']);

        $client = $this->makeClient([
            new GuzzleResponse(429, ['Content-Type' => 'application/json'], $body),
        ]);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/throttled');
            self::fail('expected StreamRateLimitException');
        } catch (StreamRateLimitException $e) {
            self::assertNull($e->getRetryAfter());
        }
    }

    /**
     * PHP retains its existing auto-retry-on-429 middleware in the CHA-2958
     * rollout. A uniform retry policy across all 6 SDKs is owned by CHA-2959.
     * With maxRetries=2 and three 429 responses, the SDK must issue exactly
     * three HTTP attempts (initial + 2 retries) and ultimately raise.
     *
     * @test
     */
    public function rateLimitAutoRetriesUpToMaxRetries(): void
    {
        $history = [];
        $body = json_encode(['code' => 9, 'message' => 'rate limited']);
        $mock = new MockHandler([
            new GuzzleResponse(429, ['Content-Type' => 'application/json', 'Retry-After' => '0'], $body),
            new GuzzleResponse(429, ['Content-Type' => 'application/json', 'Retry-After' => '0'], $body),
            new GuzzleResponse(429, ['Content-Type' => 'application/json', 'Retry-After' => '0'], $body),
        ]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));
        $client = new GuzzleHttpClient(['handler' => $stack], 2);

        try {
            $client->request('GET', 'https://example.invalid/api/v2/throttled');
            self::fail('expected StreamRateLimitException after retries exhausted');
        } catch (StreamRateLimitException $e) {
            self::assertSame(0, $e->getRetryAfter());
        }

        self::assertCount(3, $history, 'SDK must issue maxRetries+1 attempts on persistent 429s');
    }

    /** @test */
    public function connectionResetMapsToConnectionResetErrorType(): void
    {
        $req = new Request('GET', 'https://example.invalid/');
        $exc = new ConnectException(
            'cURL error 7: Failed to connect',
            $req,
            null,
            ['errno' => 7],
        );
        $client = $this->makeClient([$exc]);

        try {
            $client->request('GET', 'https://example.invalid/');
            self::fail('expected StreamTransportException');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_CONNECTION_RESET, $e->getErrorType());
            self::assertInstanceOf(ConnectException::class, $e->getPrevious(), 'cause chain must preserve the original GuzzleException');
        }
    }

    /** @test */
    public function dnsFailureMapsToDnsFailureErrorType(): void
    {
        $req = new Request('GET', 'https://example.invalid/');
        $exc = new ConnectException(
            'cURL error 6: Could not resolve host',
            $req,
            null,
            ['errno' => 6],
        );
        $client = $this->makeClient([$exc]);

        try {
            $client->request('GET', 'https://example.invalid/');
            self::fail('expected StreamTransportException');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_DNS_FAILURE, $e->getErrorType());
        }
    }

    /** @test */
    public function timeoutMapsToTimeoutErrorType(): void
    {
        $req = new Request('GET', 'https://example.invalid/');
        $exc = new ConnectException(
            'cURL error 28: Operation timed out',
            $req,
            null,
            ['errno' => 28],
        );
        $client = $this->makeClient([$exc]);

        try {
            $client->request('GET', 'https://example.invalid/');
            self::fail('expected StreamTransportException');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_TIMEOUT, $e->getErrorType());
        }
    }

    /** @test */
    public function tlsFailureMapsToTlsHandshakeFailedErrorType(): void
    {
        $req = new Request('GET', 'https://example.invalid/');
        $exc = new ConnectException(
            'cURL error 35: SSL connect error',
            $req,
            null,
            ['errno' => 35],
        );
        $client = $this->makeClient([$exc]);

        try {
            $client->request('GET', 'https://example.invalid/');
            self::fail('expected StreamTransportException');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_TLS_HANDSHAKE_FAILED, $e->getErrorType());
        }
    }

    /** @test */
    public function unknownTransportErrorMapsToUnknownErrorType(): void
    {
        $req = new Request('GET', 'https://example.invalid/');
        $exc = new ConnectException('something weird', $req, null, []);
        $client = $this->makeClient([$exc]);

        try {
            $client->request('GET', 'https://example.invalid/');
            self::fail('expected StreamTransportException');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_UNKNOWN, $e->getErrorType());
            self::assertInstanceOf(StreamException::class, $e);
        }
    }

    /** @test */
    public function streamRateLimitExceptionDirectConstructionPreservesCauseChain(): void
    {
        $previous = new \RuntimeException('underlying parse error');
        $exc = new StreamRateLimitException(
            'rate limited',
            429,
            9,
            [],
            false,
            '{"code":9}',
            null,
            null,
            15,
            $previous,
        );
        self::assertSame($previous, $exc->getPrevious());
        self::assertSame(15, $exc->getRetryAfter());
        self::assertSame(429, $exc->getStatusCode());
    }

    /** @test */
    public function streamTaskExceptionFieldsAreExposed(): void
    {
        $previous = new \RuntimeException('worker died');
        $exc = new StreamTaskException(
            'task-123',
            'worker_error',
            'queue handler raised',
            'trace text',
            'v1',
            $previous,
        );
        self::assertSame('task-123', $exc->getTaskId());
        self::assertSame('worker_error', $exc->getErrorType());
        self::assertSame('queue handler raised', $exc->getDescription());
        self::assertSame('trace text', $exc->getStackTrace());
        self::assertSame('v1', $exc->getVersion());
        self::assertSame($previous, $exc->getPrevious());
    }

    /** @test */
    public function streamApiExceptionConstructorPreservesCauseChain(): void
    {
        $previous = new \JsonException('Syntax error');
        $exc = new StreamApiException(
            'failed to parse error response',
            500,
            0,
            [],
            false,
            'garbage',
            null,
            null,
            $previous,
        );
        self::assertSame($previous, $exc->getPrevious());
    }
}
