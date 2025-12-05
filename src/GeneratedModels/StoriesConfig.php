<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $skipWatched
 * @property bool|null $trackWatched
 */
class StoriesConfig extends BaseModel
{
    public function __construct(
        public ?bool $skipWatched = null, // Whether to skip already watched stories
        public ?bool $trackWatched = null, // Whether to track watched status for stories
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
