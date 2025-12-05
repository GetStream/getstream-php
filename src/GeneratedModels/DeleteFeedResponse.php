<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string $taskID
 */
class DeleteFeedResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $taskID = null, // The ID of the async task that will handle feed cleanup and hard deletion
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
