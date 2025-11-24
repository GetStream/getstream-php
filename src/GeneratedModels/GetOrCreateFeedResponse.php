<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class GetOrCreateFeedResponse extends BaseModel
{
    public function __construct(
        public ?bool $created = null,
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?array $activities = null,
        public ?array $aggregatedActivities = null,
        public ?array $followers = null,
        public ?array $following = null,
        public ?array $members = null,
        public ?array $pinnedActivities = null,
        public ?FeedResponse $feed = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?PagerResponse $followersPagination = null,
        public ?PagerResponse $followingPagination = null,
        public ?PagerResponse $memberPagination = null,
        public ?NotificationStatusResponse $notificationStatus = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
