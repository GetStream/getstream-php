<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StoriesConfig extends BaseModel
{
    public function __construct(
        public ?string $expirationBehaviour = null,    // Behavior when stories expire 
        public ?bool $skipWatched = null,    // Whether to skip already watched stories 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
