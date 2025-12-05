<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelID
 * @property string $channelType
 * @property string $cid
 * @property \DateTime $createdAt
 * @property bool $shadow
 * @property User $createdBy
 * @property string $type
 * @property \DateTime|null $expiration
 * @property string|null $reason
 * @property string|null $team
 * @property User|null $user
 */
class UserBannedEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $shadow = null,
        public ?User $createdBy = null,
        public ?string $type = null,
        public ?\DateTime $expiration = null,
        public ?string $reason = null,
        public ?string $team = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
