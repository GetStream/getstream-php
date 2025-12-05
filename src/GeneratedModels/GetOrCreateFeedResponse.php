<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property bool $created
 * @property string $duration
 * @property array<ActivityResponse> $activities
 * @property array<AggregatedActivityResponse> $aggregatedActivities
 * @property array<FollowResponse> $followers
 * @property array<FollowResponse> $following
 * @property array<FeedMemberResponse> $members
 * @property array<ActivityPinResponse> $pinnedActivities
 * @property FeedResponse $feed
 * @property string|null $next
 * @property string|null $prev
 * @property PagerResponse|null $followersPagination
 * @property PagerResponse|null $followingPagination
 * @property PagerResponse|null $memberPagination
 * @property NotificationStatusResponse|null $notificationStatus
 */
class GetOrCreateFeedResponse extends BaseModel
{
    public function __construct(
        public ?bool $created = null,
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<ActivityResponse>|null */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null,
        /** @var array<AggregatedActivityResponse>|null */
        #[ArrayOf(AggregatedActivityResponse::class)]
        public ?array $aggregatedActivities = null,
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $followers = null,
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $following = null,
        /** @var array<FeedMemberResponse>|null */
        #[ArrayOf(FeedMemberResponse::class)]
        public ?array $members = null,
        /** @var array<ActivityPinResponse>|null */
        #[ArrayOf(ActivityPinResponse::class)]
        public ?array $pinnedActivities = null,
        public ?FeedResponse $feed = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?PagerResponse $followersPagination = null,
        public ?PagerResponse $followingPagination = null,
        public ?PagerResponse $memberPagination = null,
        public ?NotificationStatusResponse $notificationStatus = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
