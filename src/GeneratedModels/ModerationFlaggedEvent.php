<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $type
 * @property string|null $item
 * @property string|null $objectID
 * @property User|null $user
 */
class ModerationFlaggedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?string $item = null,
        public ?string $objectID = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
