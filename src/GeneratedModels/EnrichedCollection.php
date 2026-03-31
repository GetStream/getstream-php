<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EnrichedCollection extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $id = null,
        public ?object $custom = null,
        public ?string $userID = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $status = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
