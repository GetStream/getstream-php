<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property int|null $offset
 */
class PaginationParams extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $offset = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
