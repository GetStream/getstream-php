<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationQueueResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?object $filters = null,
        public ?array $sort = null,
        public ?string $description = null,
        public ?int $itemCount = null,
        public ?string $createdBy = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
