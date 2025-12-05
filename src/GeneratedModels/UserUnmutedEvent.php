<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $type
 * @property string|null $targetUser
 * @property array|null $targetUsers
 * @property User|null $user
 */
class UserUnmutedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?string $targetUser = null,
        public ?array $targetUsers = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
