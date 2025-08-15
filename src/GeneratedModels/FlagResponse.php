<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $itemID = null,    // Unique identifier of the created moderation item 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
