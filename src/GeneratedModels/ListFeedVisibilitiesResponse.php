<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ListFeedVisibilitiesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $feedVisibilities = null,    // Map of feed visibility configurations by name 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
