<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NotificationStatusResponse extends BaseModel
{
    public function __construct(
        public ?int $unread = null, // Number of unread notifications
        public ?int $unseen = null, // Number of unseen notifications
        public ?array $readActivities = null, // Deprecated: use is_read on each activity/group instead. IDs of activities that have been read. Capped at ~101 entries for aggregated feeds.
        public ?array $seenActivities = null, // Deprecated: use is_seen on each activity/group instead. IDs of activities that have been seen. Capped at ~101 entries for aggregated feeds.
        public ?\DateTime $lastSeenAt = null, // When notifications were last seen
        public ?\DateTime $lastReadAt = null, // When notifications were last read
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
