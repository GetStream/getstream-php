<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * app_channel_count params: fires when the app creates at least threshold distinct channels within time_window
 */
class AppChannelCountParameters extends BaseModel
{
    public function __construct(
        public ?int $threshold = null,
        public ?string $timeWindow = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
