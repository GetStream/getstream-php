<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * app_message_count params: fires when the app sends at least threshold chat messages within time_window
 */
class AppMessageCountParameters extends BaseModel
{
    public function __construct(
        public ?int $threshold = null,
        public ?string $timeWindow = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
