<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $limit
 * @property int $remaining
 * @property int $reset
 */
class LimitInfo extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // The maximum number of calls allowed for the time window
        public ?int $remaining = null, // The number of remaining calls in the current window
        public ?int $reset = null, // The Unix timestamp of the next window
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
