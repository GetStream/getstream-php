<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property array $channels
 * @property string $type
 * @property User|null $user
 */
class UserUnreadReminderEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?array $channels = null,
        public ?string $type = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
