<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when notification feed is updated.
 *
 * @property \DateTime $createdAt
 * @property string $fid
 * @property object $custom
 * @property string $type
 * @property string|null $feedVisibility
 * @property \DateTime|null $receivedAt
 * @property array<AggregatedActivityResponse>|null $aggregatedActivities
 * @property NotificationStatusResponse|null $notificationStatus
 * @property UserResponseCommonFields|null $user
 */
class NotificationFeedUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $fid = null, // The ID of the feed
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "feeds.notification_feed.updated" in this case
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        /** @var array<AggregatedActivityResponse>|null Aggregated activities for notification feeds */
        #[ArrayOf(AggregatedActivityResponse::class)]
        public ?array $aggregatedActivities = null, // Aggregated activities for notification feeds
        public ?NotificationStatusResponse $notificationStatus = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
