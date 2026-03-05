<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetTaskResponse extends BaseModel
{
    public function __construct(
        public ?string $taskID = null, // ID of task
        public ?string $status = null, // Current status of task
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?object $result = null, // Result produced by task after completion
        public ?ErrorResult $error = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
