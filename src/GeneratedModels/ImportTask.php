<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImportTask extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $mode = null,
        public ?string $path = null,
        public ?string $state = null,
        public ?\DateTime $updatedAt = null,
        public ?array $history = null,
        public ?int $size = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
