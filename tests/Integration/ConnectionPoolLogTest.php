<?php

declare(strict_types=1);

namespace GetStream\Tests\Integration;

use GetStream\ClientBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Log\AbstractLogger;

/**
 * @group integration
 */
class ConnectionPoolLogTest extends TestCase
{
    public function testClientInitializedLogContainsAllKnobs(): void
    {
        $logger = new class extends AbstractLogger {
            /** @var list<array{level: string, message: string, context: array}> */
            public array $records = [];

            public function log($level, \Stringable|string $message, array $context = []): void
            {
                $this->records[] = ['level' => (string) $level, 'message' => (string) $message, 'context' => $context];
            }
        };

        (new ClientBuilder())
            ->apiKey('k')->apiSecret('s')
            ->maxConnsPerHost(7)->idleTimeout(33)->connectTimeout(2)->requestTimeout(11)
            ->logger($logger)
            ->skipEnvLoad()
            ->build();

        self::assertCount(1, $logger->records);
        $event = $logger->records[0];
        self::assertSame('info', $event['level']);
        self::assertSame('client.initialized', $event['message']);
        self::assertSame(7, $event['context']['stream.client.max_conns_per_host']);
        self::assertSame(33, $event['context']['stream.client.idle_timeout_seconds']);
        self::assertSame(2, $event['context']['stream.client.connect_timeout_seconds']);
        self::assertSame(11, $event['context']['stream.client.request_timeout_seconds']);
        self::assertFalse($event['context']['stream.client.user_http_client']);
    }

    public function testClientInitializedLogIndicatesEscapeHatchUsed(): void
    {
        $logger = new class extends AbstractLogger {
            /** @var list<array{level: string, message: string, context: array}> */
            public array $records = [];

            public function log($level, \Stringable|string $message, array $context = []): void
            {
                $this->records[] = ['level' => (string) $level, 'message' => (string) $message, 'context' => $context];
            }
        };

        $mock = new class implements \GetStream\Http\HttpClientInterface {
            public function request(string $method, string $url, array $headers = [], mixed $body = null, array $options = []): \GetStream\StreamResponse
            {
                return new \GetStream\StreamResponse(200, [], null, '');
            }
        };

        (new ClientBuilder())
            ->apiKey('k')->apiSecret('s')
            ->httpClient($mock)
            ->logger($logger)
            ->skipEnvLoad()
            ->build();

        self::assertCount(1, $logger->records);
        self::assertSame('client.initialized', $logger->records[0]['message']);
        self::assertTrue($logger->records[0]['context']['stream.client.user_http_client']);
    }
}
