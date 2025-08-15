<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnreadCountsThread extends BaseModel
{
    public function __construct(
        public ?\DateTime $lastRead = null,
        public ?string $lastReadMessageID = null,
        public ?string $parentMessageID = null,
        public ?int $unreadCount = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
