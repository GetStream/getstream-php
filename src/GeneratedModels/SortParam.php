<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SortParam extends BaseModel
{
    public function __construct(
        public ?string $field = null,
        public ?string $type = null,
        public ?int $direction = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
