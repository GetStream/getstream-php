<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class LimitInfoResponse extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // The maximum number of API calls allowed per time window
        public ?int $remaining = null, // The number of remaining calls in the current window
        public ?int $reset = null, // The Unix timestamp when the rate limit resets
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
