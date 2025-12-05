<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $unread
 * @property int $unseen
 * @property \DateTime|null $lastReadAt
 * @property \DateTime|null $lastSeenAt
 * @property array|null $readActivities
 * @property array|null $seenActivities
 */
class NotificationStatusResponse extends BaseModel
{
    public function __construct(
        public ?int $unread = null, // Number of unread notifications
        public ?int $unseen = null, // Number of unseen notifications
        public ?\DateTime $lastReadAt = null,
        public ?\DateTime $lastSeenAt = null, // When notifications were last seen
        public ?array $readActivities = null, // IDs of activities that have been read
        public ?array $seenActivities = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
