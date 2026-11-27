<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedResponse extends BaseModel
{
    public function __construct(
        public ?FeedResponse $feed = null,
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
        public ?PagerResponse $memberPagination = null,
        public ?PagerResponse $followersPagination = null,
        public ?PagerResponse $followingPagination = null,
        public ?NotificationStatusResponse $notificationStatus = null,
        public ?array $degradedSelectors = null, // Activity selectors dropped from this read because they exceeded their time budget (see the time_budget_ms selector setting). Their activities are missing from this page, and they stay out for the rest of this pagination session. Omitted when every selector completed
        public ?RankingConfig $rankingConfig = null,
        public ?string $requestID = null, // Signed token identifying this read. Pass it with activity metrics events to attribute them to this read. Only set on feed reads for paid plans with an authenticated user, when the app uses feed impressions (For You exploration, or a For You ranking that uses impressions_bucket) or For You engagement analytics
        public ?bool $created = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
