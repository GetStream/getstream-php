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
        // idleTimeout is enforced via libcurl's per-connection lifetime cap (CURLOPT_MAXLIFETIME_CONN).
        // Available since libcurl 7.80.0; if the constant is unavailable, pooling still works without it.
        if (defined('CURLOPT_MAXLIFETIME_CONN')) {
            self::assertSame(40, $opts['curl'][\constant('CURLOPT_MAXLIFETIME_CONN')] ?? null);
        }
    }

    /** @test */
    public function defaultsApplyWhenNoPoolConfigPassed(): void
    {
        $sdk = $this->buildWithHistory();
        $sdk->request('GET', 'http://example.test/');

        $opts = $this->history[0]['options'];
        self::assertSame(30, $opts['timeout'] ?? null);
        self::assertSame(10, $opts['connect_timeout'] ?? null);
        if (defined('CURLOPT_MAXLIFETIME_CONN')) {
            self::assertSame(55, $opts['curl'][\constant('CURLOPT_MAXLIFETIME_CONN')] ?? null);
        }
    }

    /** @test */
    public function defaultHandlerIsPersistentCurlMultiHandler(): void
    {
        // When no handler is supplied, the default stack must wrap a CurlMultiHandler
        // so the per-host connection cap (CURLMOPT_MAX_HOST_CONNECTIONS) is real
        // across requests in long-running runtimes.
        $sdk = new GuzzleHttpClient([], new PoolConfig());

        $clientProp = (new \ReflectionObject($sdk))->getProperty('client');
        $clientProp->setAccessible(true);
        $guzzle = $clientProp->getValue($sdk);

        $configProp = (new \ReflectionObject($guzzle))->getProperty('config');
        $configProp->setAccessible(true);
        $config = $configProp->getValue($guzzle);

        self::assertInstanceOf(HandlerStack::class, $config['handler']);

        $stack = $config['handler'];
        $handlerProp = (new \ReflectionObject($stack))->getProperty('handler');
        $handlerProp->setAccessible(true);
        self::assertInstanceOf(\GuzzleHttp\Handler\CurlMultiHandler::class, $handlerProp->getValue($stack));
    }

    /** @test */
    public function userConfigOverridesPoolDefaults(): void
    {
        $pool = new PoolConfig(requestTimeout: 25);
        $sdk = $this->buildWithHistory($pool, ['timeout' => 99]);

        $sdk->request('GET', 'http://example.test/');
        self::assertSame(99, $this->history[0]['options']['timeout'] ?? null);
    }

    /** @test */
    public function perCallTimeoutOptionReachesGuzzle(): void
    {
        $sdk = $this->buildWithHistory();
        $sdk->request('GET', 'http://example.test/', [], null, ['timeout' => 2]);

        self::assertSame(2, $this->history[0]['options']['timeout'] ?? null,
            'per-call timeout reaches Guzzle request options');
    }

    /** @test */
    public function perCallOptionOverridesClientDefault(): void
    {
        $sdk = $this->buildWithHistory(new PoolConfig(requestTimeout: 17));
        $sdk->request('GET', 'http://example.test/', [], null, ['timeout' => 2]);

        // Per-call 2s wins over client default 17s.
        self::assertSame(2, $this->history[0]['options']['timeout'] ?? null);
    }
}
