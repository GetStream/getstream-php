<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Http\GuzzleHttpClient;
use GetStream\Http\PoolConfig;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use PHPUnit\Framework\TestCase;

class GuzzleHttpClientPoolTest extends TestCase
{
    /** @var array<int, array{request: \Psr\Http\Message\RequestInterface, response: \Psr\Http\Message\ResponseInterface, options: array}> */
    private array $history = [];

    /**
     * Build a GuzzleHttpClient whose underlying handler is a MockHandler
     * fronted by a history middleware. Records into $this->history.
     */
    private function buildWithHistory(?PoolConfig $pool = null, array $extraConfig = []): GuzzleHttpClient
    {
        $this->history = [];
        $mock = new MockHandler([new GuzzleResponse(200, ['Content-Type' => 'application/json'], '{}')]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($this->history));

        return new GuzzleHttpClient(
            array_merge(['handler' => $stack], $extraConfig),
            0,
            $pool,
        );
    }

    /** @test */
    public function appliesPoolConfigToGuzzleDefaults(): void
    {
        $pool = new PoolConfig(maxConnsPerHost: 8, idleTimeout: 40, connectTimeout: 4, requestTimeout: 25);
        $sdk = $this->buildWithHistory($pool);

        $sdk->request('GET', 'http://example.test/');

        $opts = $this->history[0]['options'];
        self::assertSame(25, $opts['timeout'] ?? null);
        self::assertSame(4, $opts['connect_timeout'] ?? null);
        self::assertSame(8, $opts['curl'][CURLOPT_MAXCONNECTS] ?? null);
    }

    /** @test */
    public function defaultsApplyWhenNoPoolConfigPassed(): void
    {
        $sdk = $this->buildWithHistory();
        $sdk->request('GET', 'http://example.test/');

        $opts = $this->history[0]['options'];
        self::assertSame(30, $opts['timeout'] ?? null);
        self::assertSame(10, $opts['connect_timeout'] ?? null);
        self::assertSame(5, $opts['curl'][CURLOPT_MAXCONNECTS] ?? null);
    }

    /** @test */
    public function userConfigOverridesPoolDefaults(): void
    {
        $pool = new PoolConfig(requestTimeout: 25);
        $sdk = $this->buildWithHistory($pool, ['timeout' => 99]);

        $sdk->request('GET', 'http://example.test/');
        self::assertSame(99, $this->history[0]['options']['timeout'] ?? null);
    }
}
