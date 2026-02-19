<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReadStateResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?\DateTime $lastRead = null,
        public ?int $unreadMessages = null,
        public ?string $lastReadMessageID = null,
        public ?\DateTime $lastDeliveredAt = null,
        public ?string $lastDeliveredMessageID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
