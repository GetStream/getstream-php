<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Http\GuzzleHttpClient;
use GetStream\Http\LogRedaction;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;

final class RecordingLogger extends AbstractLogger
{
    /** @var list<array{level: string, message: string, context: array}> */
    public array $records = [];

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->records[] = ['level' => (string) $level, 'message' => (string) $message, 'context' => $context];
    }

    /** @return list<array{level: string, message: string, context: array}> */
    public function named(string $event): array
    {
        return array_values(array_filter($this->records, fn ($r) => $r['message'] === $event));
    }
}

final class LoggingTest extends TestCase
{
    private function client(array $responses, RecordingLogger $logger, bool $logBodies = false): GuzzleHttpClient
    {
        $stack = HandlerStack::create(new MockHandler($responses));

        return new GuzzleHttpClient(['handler' => $stack], 3, null, $logger, $logBodies);
    }

    public function testSentAndReceivedOnSuccess(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([new Response(200, ['Content-Type' => 'application/json'], '{"ok":true}')], $logger);
        $client->request('GET', 'http://localhost/api/v2/app?api_key=key');
        $this->assertCount(1, $logger->named('http.request.sent'));
        $received = $logger->named('http.response.received');
        $this->assertCount(1, $received);
        $this->assertSame(200, $received[0]['context']['http.response.status_code']);
        $this->assertArrayHasKey('duration_ms', $received[0]['context']);
    }

    public function testErrorStatusIsReceivedNotFailed(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([new Response(500, ['Content-Type' => 'application/json'], '{"code":1,"message":"boom"}')], $logger);
        try {
            $client->request('GET', 'http://localhost/api/v2/app');
            $this->fail('expected exception');
        } catch (\GetStream\Exceptions\StreamApiException) {
        }
        $this->assertCount(1, $logger->named('http.response.received'));
        $this->assertCount(0, $logger->named('http.request.failed'));
    }

    public function testTransportFailureEmitsFailed(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([new ConnectException('reset', new Request('GET', 'http://localhost/x'))], $logger);
        try {
            $client->request('GET', 'http://localhost/x');
            $this->fail('expected exception');
        } catch (\GetStream\Exceptions\StreamTransportException) {
        }
        $failed = $logger->named('http.request.failed');
        $this->assertCount(1, $failed);
        $this->assertSame('error', $failed[0]['level']);
        $this->assertArrayHasKey('error.type', $failed[0]['context']);
    }

    public function testTransportFailureRedactsSecretFromMessage(): void
    {
        // Guzzle builds its ConnectException message by appending the full
        // request URL (incl. query string); its own redaction only strips
        // HTTP Basic userinfo, not query params. This is the mainline shape
        // of that message for a DNS/connect/TLS/timeout failure.
        $leakyMessage = 'cURL error 7: Failed to connect to 127.0.0.1 port 1 after 0 ms: '
            . 'Couldn\'t connect to server for http://localhost/api/v2/app?api_key=SUPERSECRETKEY&user_id=123';
        $logger = new RecordingLogger();
        $client = $this->client(
            [new ConnectException($leakyMessage, new Request('GET', 'http://localhost/api/v2/app?api_key=SUPERSECRETKEY&user_id=123'))],
            $logger,
        );
        try {
            $client->request('GET', 'http://localhost/api/v2/app?api_key=SUPERSECRETKEY&user_id=123');
            $this->fail('expected exception');
        } catch (\GetStream\Exceptions\StreamTransportException) {
        }
        $failed = $logger->named('http.request.failed');
        $message = $failed[0]['context']['error.message'];
        $this->assertStringContainsString('api_key=<redacted>', $message);
        $this->assertStringNotContainsString('SUPERSECRETKEY', $message);
    }

    public function testQueryRedaction(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([new Response(200, [], '{}')], $logger);
        $client->request('GET', 'http://localhost/api/v2/app?api_key=sekret&x=1');
        $sent = $logger->named('http.request.sent')[0];
        $this->assertStringNotContainsString('sekret', $sent['context']['url.query']);
        $this->assertStringContainsString('<redacted>', $sent['context']['url.query']);
    }

    public function testLogBodiesOffByDefaultOnWithRedaction(): void
    {
        $logger = new RecordingLogger();
        $client = $this->client([new Response(200, ['Content-Type' => 'application/json'], '{"token":"tok","keep":"v"}')], $logger);
        $client->request('GET', 'http://localhost/x');
        $this->assertArrayNotHasKey('http.response.body', $logger->named('http.response.received')[0]['context']);

        $logger2 = new RecordingLogger();
        $client2 = $this->client([new Response(200, ['Content-Type' => 'application/json'], '{"token":"tok","keep":"v"}')], $logger2, true);
        $client2->request('GET', 'http://localhost/x');
        $body = $logger2->named('http.response.received')[0]['context']['http.response.body'];
        // Quoted, not bare: the key name "token" itself contains the substring
        // "tok", and redaction preserves key names (only values are redacted).
        // Bare assertStringNotContainsString('tok', ...) can never pass while
        // the "token" key is present; mirrors the quoted-value check below in
        // testRedactionHelpers.
        $this->assertStringNotContainsString('"tok"', $body);
        $this->assertStringContainsString('keep', $body);
    }

    public function testRedactionHelpers(): void
    {
        $this->assertSame('api_key=<redacted>&x=1', LogRedaction::redactQuery('api_key=sekret&x=1'));
        $out = LogRedaction::redactJsonBody('{"api_secret":"s","password":"p","keep":"v"}');
        $this->assertStringNotContainsString('"s"', $out);
        $this->assertStringNotContainsString('"p"', $out);
        $this->assertStringContainsString('"keep":"v"', $out);
        $this->assertSame('not json', LogRedaction::redactJsonBody('not json'));

        $this->assertSame(
            'api_key=<redacted>&user_id=123',
            LogRedaction::redactMessage('api_key=SUPERSECRETKEY&user_id=123'),
        );
        $this->assertSame(
            'api_secret=<redacted> token=<redacted>',
            LogRedaction::redactMessage('api_secret=shh token=tok'),
        );
        $this->assertStringContainsString('user_id=123', LogRedaction::redactMessage('user_id=123'));
    }
}
