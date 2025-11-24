<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedVisibilityResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // Name of the feed visibility level 
        public ?array $permissions = null,    // List of permission policies 
        public ?array $grants = null,    // Permission grants for each role 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
