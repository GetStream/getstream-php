<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $messageID
 * @property int $score
 * @property string $type
 * @property \DateTime $updatedAt
 * @property object $custom
 * @property string|null $userID
 * @property User|null $user
 */
class Reaction extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $messageID = null,
        public ?int $score = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?string $userID = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
