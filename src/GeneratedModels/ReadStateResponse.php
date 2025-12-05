<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $lastRead
 * @property int $unreadMessages
 * @property UserResponse $user
 * @property \DateTime|null $lastDeliveredAt
 * @property string|null $lastDeliveredMessageID
 * @property string|null $lastReadMessageID
 */
class ReadStateResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $lastRead = null,
        public ?int $unreadMessages = null,
        public ?UserResponse $user = null,
        public ?\DateTime $lastDeliveredAt = null,
        public ?string $lastDeliveredMessageID = null,
        public ?string $lastReadMessageID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
