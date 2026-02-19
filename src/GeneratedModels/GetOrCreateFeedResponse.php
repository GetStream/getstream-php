<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetOrCreateFeedResponse extends BaseModel
{
    public function __construct(
        public ?FeedResponse $feed = null,
        public ?PagerResponse $followersPagination = null,
        public ?PagerResponse $followingPagination = null,
        public ?PagerResponse $memberPagination = null,
        public ?NotificationStatusResponse $notificationStatus = null,
        /** @var array<ActivityResponse>|null */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null,
        /** @var array<AggregatedActivityResponse>|null */
        #[ArrayOf(AggregatedActivityResponse::class)]
        public ?array $aggregatedActivities = null,
        /** @var array<FeedMemberResponse>|null */
        #[ArrayOf(FeedMemberResponse::class)]
        public ?array $members = null,
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $followers = null,
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $following = null,
        /** @var array<ActivityPinResponse>|null */
        #[ArrayOf(ActivityPinResponse::class)]
        public ?array $pinnedActivities = null,
        public ?bool $created = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
