<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReadCollectionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $collections = null,    // List of collections matching the query 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
