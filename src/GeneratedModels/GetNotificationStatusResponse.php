<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetNotificationStatusResponse extends BaseModel
{
    public function __construct(
        public ?int $unread = null, // Number of unread activities or groups
        public ?int $unseen = null, // Number of unseen activities or groups
        public ?\DateTime $lastSeenAt = null, // When the feed was last marked seen
        public ?\DateTime $lastReadAt = null, // When the feed was last marked read
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
