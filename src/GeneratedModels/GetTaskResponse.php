<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $duration
 * @property string $status
 * @property string $taskID
 * @property \DateTime $updatedAt
 * @property ErrorResult|null $error
 * @property object|null $result
 */
class GetTaskResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $duration = null,
        public ?string $status = null, // Current status of task
        public ?string $taskID = null, // ID of task
        public ?\DateTime $updatedAt = null,
        public ?ErrorResult $error = null,
        public ?object $result = null, // Result produced by task after completion
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
