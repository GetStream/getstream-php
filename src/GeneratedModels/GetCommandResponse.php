<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $args
 * @property string $description
 * @property string $duration
 * @property string $name
 * @property string $set
 * @property \DateTime|null $createdAt
 * @property \DateTime|null $updatedAt
 */
class GetCommandResponse extends BaseModel
{
    public function __construct(
        public ?string $args = null,
        public ?string $description = null,
        public ?string $duration = null,
        public ?string $name = null,
        public ?string $set = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
