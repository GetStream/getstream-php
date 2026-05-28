<?php

declare(strict_types=1);

namespace GetStream\Tests;

use GetStream\Client;
use GetStream\Exceptions\StreamTaskException;
use GetStream\Exceptions\StreamTransportException;
use GetStream\Http\HttpClientInterface;
use GetStream\StreamResponse;
use PHPUnit\Framework\TestCase;

/**
 * Covers CHA-2958 §8: the task-waiting helper polls until completed / failed
 * / timeout and surfaces a StreamTaskException on failure.
 */
class WaitForTaskTest extends TestCase
{
    private const HEADERS = ['content-type' => 'application/json'];

    /**
     * @param array<int, array<string, mixed>> $payloads
     */
    private function buildClient(array $payloads, ?int $virtualNow = null): TestableClient
    {
        $http = $this->createMock(HttpClientInterface::class);
        $queue = $payloads;
        $http->method('request')->willReturnCallback(function () use (&$queue): StreamResponse {
            if (empty($queue)) {
                $payload = ['task_id' => 't-final', 'status' => 'running'];
            } else {
                $payload = array_shift($queue);
            }
            $raw = (string) json_encode($payload);
            return new StreamResponse(200, self::HEADERS, $payload, $raw);
        });
        return new TestableClient('key', 'secret', 'https://example.invalid', $http, $virtualNow);
    }

    /** @test */
    public function waitForTaskReturnsCompletedPayload(): void
    {
        $client = $this->buildClient([
            ['task_id' => 't-1', 'status' => 'running'],
            ['task_id' => 't-1', 'status' => 'completed', 'result' => ['done' => true]],
        ]);

        $task = $client->waitForTask('t-1', 0, 60);

        self::assertSame('completed', $task->status);
        self::assertSame('t-1', $task->taskID);
    }

    /** @test */
    public function waitForTaskThrowsStreamTaskExceptionOnFailedStatus(): void
    {
        $client = $this->buildClient([
            [
                'task_id' => 't-2',
                'status' => 'failed',
                'error' => [
                    'type' => 'worker_error',
                    'description' => 'queue handler raised',
                    'stacktrace' => 'frame 1',
                    'version' => 'v1.2.3',
                ],
            ],
        ]);

        try {
            $client->waitForTask('t-2', 0, 60);
            self::fail('expected StreamTaskException');
        } catch (StreamTaskException $e) {
            self::assertSame('t-2', $e->getTaskId());
            self::assertSame('worker_error', $e->getErrorType());
            self::assertSame('queue handler raised', $e->getDescription());
            self::assertSame('frame 1', $e->getStackTrace());
            self::assertSame('v1.2.3', $e->getVersion());
        }
    }

    /** @test */
    public function waitForTaskTimeoutThrowsTransportException(): void
    {
        $client = $this->buildClient([
            ['task_id' => 't-3', 'status' => 'running'],
            ['task_id' => 't-3', 'status' => 'running'],
            ['task_id' => 't-3', 'status' => 'running'],
        ], virtualNow: 1000);
        $client->advanceClockBy = 5;

        try {
            $client->waitForTask('t-3', 0, 1);
            self::fail('expected StreamTransportException for timeout');
        } catch (StreamTransportException $e) {
            self::assertSame(StreamTransportException::ERROR_TYPE_TIMEOUT, $e->getErrorType());
            self::assertNotNull($e->getPrevious(), 'cause chain must wrap a runtime timeout');
            self::assertStringContainsString('t-3', $e->getMessage());
        }
    }
}

/**
 * Client subclass exposing a virtual clock so the timeout branch can be
 * exercised without sleeping for real. Each call to `now()` advances by
 * `$advanceClockBy` seconds — that mirrors elapsed time between poll
 * iterations without involving wall-clock.
 */
class TestableClient extends Client
{
    public int $advanceClockBy = 0;
    private int $virtualClock;

    public function __construct(string $apiKey, string $apiSecret, string $baseUrl, HttpClientInterface $http, ?int $virtualNow = null)
    {
        parent::__construct($apiKey, $apiSecret, $baseUrl, $http);
        $this->virtualClock = $virtualNow ?? time();
    }

    protected function now(): int
    {
        $current = $this->virtualClock;
        $this->virtualClock += $this->advanceClockBy;
        return $current;
    }
}
