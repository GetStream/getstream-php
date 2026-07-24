<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use GetStream\Http\GuzzleHttpClient;

/**
 * GuzzleHttpClient subclass that records backoff durations instead of
 * sleeping, so retry tests run instantly.
 *
 * Lives in its own PSR-4-autoloadable file (not inside a test case) so any
 * test that references it works under paratest's per-process WrapperRunner,
 * where a worker only loads the single test file it runs.
 */
final class RecordingClient extends GuzzleHttpClient
{
    /** @var list<float> */
    public array $sleeps = [];

    protected function sleepSeconds(float $seconds): void
    {
        $this->sleeps[] = $seconds;
    }
}
