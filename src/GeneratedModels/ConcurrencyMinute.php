<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ConcurrencyMinute extends BaseModel
{
    public function __construct(
        public ?string $minute = null,
        public ?int $min = null,
        public ?int $max = null,
        public ?int $joins = null,
        public ?int $leaves = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
