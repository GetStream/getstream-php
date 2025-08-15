<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Segment extends BaseModel
{
    public function __construct(
        public ?bool $allSenderChannels = null,
        public ?bool $allUsers = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?int $size = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $deletedAt = null,
        public ?string $description = null,
        public ?string $taskID = null,
        public ?object $filter = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
