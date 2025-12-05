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
 * @property string $type
 * @property string|null $team
 * @property User|null $user
 */
class UserUnbannedEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $shadow = null,
        public ?string $type = null,
        public ?string $team = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
