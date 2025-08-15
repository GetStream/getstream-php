<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedInput extends BaseModel
{
    public function __construct(
        public ?string $description = null,
        public ?string $name = null,
        public ?string $visibility = null,
        public ?array $filterTags = null,
        public ?array $members = null,
        public ?object $custom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
