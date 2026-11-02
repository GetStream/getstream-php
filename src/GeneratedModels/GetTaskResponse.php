<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetTaskResponse extends BaseModel
{
    public function __construct(
        public ?string $taskID = null, // ID of task
        public ?string $status = null, // Current status of the whole operation. A task whose result reports an in-progress status of its own is returned as running until that status is terminal, so completed means the operation itself finished rather than that its first step was accepted. A result that never reaches a terminal status stops being reported as running after a fixed period and falls back to the task's own status.
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?object $result = null, // Result produced by task after completion. A task that does its work in stages may carry a status of its own here, describing that work rather than the task; the top-level status already accounts for it, so use that to tell whether the operation has finished.
        public ?ErrorResult $error = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
