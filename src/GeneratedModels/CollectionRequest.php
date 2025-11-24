<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CollectionRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // Name/type of the collection 
        public ?object $custom = null,    // Custom data for the collection (required, must contain at least one key) 
        public ?string $id = null,    // Unique identifier for the collection within its name (optional, will be auto-generated if not provided) 
        public ?string $userID = null,    // ID of the user who owns this collection 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
