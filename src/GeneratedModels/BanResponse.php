<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property \DateTime|null $expires
 * @property string|null $reason
 * @property bool|null $shadow
 * @property UserResponse|null $bannedBy
 * @property ChannelResponse|null $channel
 * @property UserResponse|null $user
 */
class BanResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?\DateTime $expires = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?UserResponse $bannedBy = null,
        public ?ChannelResponse $channel = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
