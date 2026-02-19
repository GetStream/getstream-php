<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCommandResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $args = null,
        public ?string $set = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
