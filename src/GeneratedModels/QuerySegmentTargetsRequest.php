<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QuerySegmentTargetsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,    // Limit 
        public ?string $next = null,    // Next 
        public ?string $prev = null,    // Prev 
        public ?array $sort = null,
        public ?object $filter = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
