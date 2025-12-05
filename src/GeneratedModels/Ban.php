<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property bool $shadow
 * @property \DateTime|null $expires
 * @property string|null $reason
 * @property Channel|null $channel
 * @property User|null $createdBy
 * @property User|null $target
 */
class Ban extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?bool $shadow = null,
        public ?\DateTime $expires = null,
        public ?string $reason = null,
        public ?Channel $channel = null,
        public ?User $createdBy = null,
        public ?User $target = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
