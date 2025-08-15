<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $recommendedAction = null,    // Suggested action based on moderation results 
        public ?string $status = null,    // Status of the moderation check (completed or pending) 
        public ?string $taskID = null,    // ID of the running moderation task 
        public ?ReviewQueueItemResponse $item = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
