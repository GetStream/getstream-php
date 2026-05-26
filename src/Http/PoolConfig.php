<?php

declare(strict_types=1);

namespace GetStream\Http;

/**
 * Immutable value object for the 5 canonical HTTP connection-pool knobs (spec §4).
 * Defaults: 5 conns/host, 55s idle, 10s connect, 30s request. KeepAlive is an
 * invariant (true). All durations are whole seconds.
 */
final class PoolConfig
{
    public function __construct(
        public readonly int $maxConnsPerHost = 5,
        public readonly int $idleTimeout = 55,
        public readonly int $connectTimeout = 10,
        public readonly int $requestTimeout = 30,
    ) {
    }

    public function withMaxConnsPerHost(int $n): self
    {
        return new self($n, $this->idleTimeout, $this->connectTimeout, $this->requestTimeout);
    }

    public function withIdleTimeout(int $seconds): self
    {
        return new self($this->maxConnsPerHost, $seconds, $this->connectTimeout, $this->requestTimeout);
    }

    public function withConnectTimeout(int $seconds): self
    {
        return new self($this->maxConnsPerHost, $this->idleTimeout, $seconds, $this->requestTimeout);
    }

    public function withRequestTimeout(int $seconds): self
    {
        return new self($this->maxConnsPerHost, $this->idleTimeout, $this->connectTimeout, $seconds);
    }
}
