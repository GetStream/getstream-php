<?php

declare(strict_types=1);

namespace GetStream\Exceptions;

/**
 * Thrown when an async task observed via `Client::waitForTask` settles into
 * `status: "failed"`. Carries the task identifier plus the task's
 * `ErrorResult` payload.
 */
class StreamTaskException extends StreamException
{
    private string $taskId;
    private string $errorType;
    private string $description;
    private ?string $stackTrace;
    private ?string $version;

    public function __construct(
        string $taskId,
        string $errorType,
        string $description,
        ?string $stackTrace = null,
        ?string $version = null,
        ?\Throwable $previous = null,
    ) {
        $message = sprintf('Task %s failed: %s (%s)', $taskId, $description, $errorType);
        parent::__construct($message, 0, $previous);
        $this->taskId = $taskId;
        $this->errorType = $errorType;
        $this->description = $description;
        $this->stackTrace = $stackTrace;
        $this->version = $version;
    }

    public function getTaskId(): string
    {
        return $this->taskId;
    }

    public function getErrorType(): string
    {
        return $this->errorType;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStackTrace(): ?string
    {
        return $this->stackTrace;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }
}
