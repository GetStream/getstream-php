<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Segment extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?object $filter = null,
        public ?bool $allUsers = null,
        public ?bool $allSenderChannels = null,
        public ?string $taskID = null,
        public ?int $size = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
