<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Exceptions\StreamRateLimitException;
use GetStream\Exceptions\StreamTransportException;
use GetStream\Http\RetryConfig;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

// RecordingClient moved to its own autoloadable file (tests/Http/RecordingClient.php)
// so it resolves under paratest's per-process runner; see that file.

final class RetryTest extends TestCase
{
    /** @var list<array{request: Request}> */
    private array $history = [];

    private function client(array $responses, ?RetryConfig $retry, ?RecordingLogger $logger = null): RecordingClient
    {
        $this->history = [];
        $mock = new MockHandler($responses);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($this->history));

        // Constructor is (config, maxRetries [deprecated/ignored], pool, logger, logBodies, retry).
        return new RecordingClient(['handler' => $stack], 3, null, $logger, false, $retry);
    }

    /** Retry-attempt records only (the DEBUG `http.request.failed` emitted before a retry, not the final ERROR one). */
    private static function retryRecords(RecordingLogger $logger): array
    {
        return array_values(array_filter(
            $logger->named('http.request.failed'),
            fn (array $r) => $r['level'] === 'debug',
        ));
    }

    private static function enabled(int $maxAttempts = 3, float $maxBackoff = 30.0): RetryConfig
    {
        return new RetryConfig(enabled: true, maxAttempts: $maxAttempts, maxBackoff: $maxBackoff);
    }

    public function testDisabledByDefaultDoesNotRetry(): void
    {
        $client = $this->client([new Response(429, ['Retry-After' => '1'], '{}')], null);
        $this->expectException(StreamRateLimitException::class);
        try {
            $client->request('GET', 'http://localhost/x');
        } finally {
            $this->assertCount(1, $this->history);
            $this->assertSame([], $client->sleeps);
        }
    }

    public function testEnabledGetRetriesOn429AndHonorsRetryAfter(): void
    {
        $client = $this->client([
            new Response(429, ['Retry-After' => '2'], '{}'),
            new Response(200, [], '{"ok":true}'),
        ], self::enabled());
        $response = $client->request('GET', 'http://localhost/x');
        $this->assertSame(200, $response->getStatusCode());
        $this->assertCount(2, $this->history);
        $this->assertSame([2.0], $client->sleeps);
    }

    public function testEnabledPostIsNeverRetried(): void
    {
        $client = $this->client([new Response(429, [], '{}')], self::enabled());
        $this->expectException(StreamRateLimitException::class);
        try {
            $client->request('POST', 'http://localhost/x');
        } finally {
            $this->assertCount(1, $this->history);
        }
    }

    public function testUnrecoverable429IsNeverRetried(): void
    {
        $client = $this->client(
            [new Response(429, [], '{"message":"nope","unrecoverable":true}')],
            self::enabled(),
        );
        $this->expectException(StreamRateLimitException::class);
        try {
            $client->request('GET', 'http://localhost/x');
        } finally {
            $this->assertCount(1, $this->history);
        }
    }

    public function testTransportErrorIsRetried(): void
    {
        $client = $this->client([
            new ConnectException('reset', new Request('GET', 'http://localhost/x')),
            new Response(200, [], '{"ok":true}'),
        ], self::enabled(maxBackoff: 0.001));
        $response = $client->request('GET', 'http://localhost/x');
        $this->assertSame(200, $response->getStatusCode());
        $this->assertCount(2, $this->history);
    }

    public function testExhaustionSurfacesLastErrorAfterMaxAttempts(): void
    {
        $client = $this->client([
            new Response(429, [], '{}'),
            new Response(429, [], '{}'),
            new Response(429, [], '{}'),
        ], self::enabled(maxAttempts: 3, maxBackoff: 0.001));
        $this->expectException(StreamRateLimitException::class);
        try {
            $client->request('GET', 'http://localhost/x');
        } finally {
            $this->assertCount(3, $this->history);
        }
    }

    public function testRetryAfterIsClampedToMaxBackoff(): void
    {
        $client = $this->client([
            new Response(429, ['Retry-After' => '600'], '{}'),
            new Response(200, [], '{"ok":true}'),
        ], self::enabled(maxBackoff: 30.0));
        $client->request('GET', 'http://localhost/x');
        $this->assertSame([30.0], $client->sleeps);
    }

    /** Jitter bound unit check: no Retry-After, so delay must land in [0, min(maxBackoff, 2^attempt)]. */
    public function testJitterDelayStaysWithinBounds(): void
    {
        $client = $this->client([], self::enabled(maxAttempts: 5, maxBackoff: 3.0));
        $ref = new \ReflectionMethod($client, 'retryDelay');

        foreach ([0, 1, 2, 3] as $attempt) {
            $ceiling = min(3.0, 2 ** $attempt);
            for ($i = 0; $i < 20; $i++) {
                $exc = new \GetStream\Exceptions\StreamTransportException('boom', \GetStream\Exceptions\StreamTransportException::ERROR_TYPE_UNKNOWN);
                $delay = $ref->invoke($client, $exc, $attempt);
                $this->assertGreaterThanOrEqual(0.0, $delay);
                $this->assertLessThanOrEqual($ceiling, $delay);
            }
        }
    }

    /** A retried transport error carries the canonical `error.type` classifier plus `retry.attempt`. */
    public function testTransportErrorRetryLogCarriesErrorType(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([
            new ConnectException('reset', new Request('GET', 'http://localhost/x')),
            new Response(200, [], '{"ok":true}'),
        ], self::enabled(maxBackoff: 0.001), $logger);
        $client->request('GET', 'http://localhost/x');

        $retries = self::retryRecords($logger);
        $this->assertCount(1, $retries);
        // ConnectException message inspection (no handler-context errno on the mock):
        // "reset" matches the connection_reset branch in mapConnectErrorType().
        $this->assertSame(StreamTransportException::ERROR_TYPE_CONNECTION_RESET, $retries[0]['context']['error.type']);
        $this->assertSame(1, $retries[0]['context']['retry.attempt']);
    }

    /** A retried 429 carries `retry.attempt` but never `error.type` / the invented `rate_limited` value: that field is a closed transport-only enum. */
    public function testRateLimitRetryLogOmitsErrorType(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([
            new Response(429, ['Retry-After' => '0'], '{}'),
            new Response(200, [], '{"ok":true}'),
        ], self::enabled(), $logger);
        $client->request('GET', 'http://localhost/x');

        $retries = self::retryRecords($logger);
        $this->assertCount(1, $retries);
        $this->assertArrayNotHasKey('error.type', $retries[0]['context']);
        $this->assertSame(1, $retries[0]['context']['retry.attempt']);

        foreach ($logger->records as $record) {
            $this->assertNotSame('rate_limited', $record['context']['error.type'] ?? null);
        }
    }
}
