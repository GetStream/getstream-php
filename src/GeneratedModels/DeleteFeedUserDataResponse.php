<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for deleting feed user data
 */
class DeleteFeedUserDataResponse extends BaseModel
{
    public function __construct(
        public ?string $taskID = null, // The task ID for the deletion task
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
