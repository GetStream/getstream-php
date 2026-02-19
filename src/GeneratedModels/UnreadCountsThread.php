<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnreadCountsThread extends BaseModel
{
    public function __construct(
        public ?int $unreadCount = null,
        public ?\DateTime $lastRead = null,
        public ?string $lastReadMessageID = null,
        public ?string $parentMessageID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
