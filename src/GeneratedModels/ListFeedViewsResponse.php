<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array $views
 */
class ListFeedViewsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $views = null, // Map of feed view ID to feed view
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
