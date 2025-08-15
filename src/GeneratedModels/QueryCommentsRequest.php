<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryCommentsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null,    // MongoDB-style filter for querying comments 
        public ?int $limit = null,    // Maximum number of comments to return 
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $sort = null,    // first (oldest), last (newest) or top 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
