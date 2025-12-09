<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $direction
 * @property string|null $field
 * @property string|null $type
 */
class SortParam extends BaseModel
{
    public function __construct(
        public ?int $direction = null,
        public ?string $field = null,
        public ?string $type = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
