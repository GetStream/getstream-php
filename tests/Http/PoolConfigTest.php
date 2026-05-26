<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Http\PoolConfig;
use PHPUnit\Framework\TestCase;

class PoolConfigTest extends TestCase
{
    /** @test */
    public function defaultValues(): void
    {
        $cfg = new PoolConfig();

        self::assertSame(5, $cfg->maxConnsPerHost);
        self::assertSame(55, $cfg->idleTimeout);
        self::assertSame(10, $cfg->connectTimeout);
        self::assertSame(30, $cfg->requestTimeout);
    }

    /** @test */
    public function withMaxConnsPerHostReturnsNewInstance(): void
    {
        $cfg = new PoolConfig();
        $updated = $cfg->withMaxConnsPerHost(20);

        self::assertNotSame($cfg, $updated, 'withers return new instances (immutability)');
        self::assertSame(5, $cfg->maxConnsPerHost, 'original unchanged');
        self::assertSame(20, $updated->maxConnsPerHost);
    }

    /** @test */
    public function withAllKnobsOverridden(): void
    {
        $cfg = (new PoolConfig())
            ->withMaxConnsPerHost(15)
            ->withIdleTimeout(45)
            ->withConnectTimeout(3)
            ->withRequestTimeout(20);

        self::assertSame(15, $cfg->maxConnsPerHost);
        self::assertSame(45, $cfg->idleTimeout);
        self::assertSame(3, $cfg->connectTimeout);
        self::assertSame(20, $cfg->requestTimeout);
    }
}
