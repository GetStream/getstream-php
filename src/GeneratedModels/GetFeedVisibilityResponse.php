<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetFeedVisibilityResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?FeedVisibilityResponse $feedVisibility = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
