<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetFeedCountsResponse extends BaseModel
{
    public function __construct(
        public ?int $activityCount = null, // Number of activities in the feed
        public ?int $commentCount = null, // Total number of comments on those activities, including nested replies
        public ?int $totalCount = null, // Sum of activity_count and comment_count
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
