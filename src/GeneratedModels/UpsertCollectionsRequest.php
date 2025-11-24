<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertCollectionsRequest extends BaseModel
{
    public function __construct(
        public ?array $collections = null,    // List of collections to upsert (insert if new, update if existing) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
