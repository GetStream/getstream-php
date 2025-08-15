<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QuerySegmentsRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null,    // Filter to apply to the query 
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $sort = null,    // Array of sort parameters 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
