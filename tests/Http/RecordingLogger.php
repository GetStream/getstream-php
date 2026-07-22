<?php

declare(strict_types=1);

namespace GetStream\Tests\Http;

use Psr\Log\AbstractLogger;

/**
 * PSR-3 logger that records every log call, for asserting on emitted events.
 *
 * Lives in its own PSR-4-autoloadable file (not inside a test case) so any
 * test that references it works under paratest's per-process WrapperRunner,
 * where a worker only loads the single test file it runs.
 */
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
