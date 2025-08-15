<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryFeedsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $feeds = null,    // List of feeds matching the query 
        public ?string $next = null,    // Cursor for next page 
        public ?string $prev = null,    // Cursor for previous page 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
