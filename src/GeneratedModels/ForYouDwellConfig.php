<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForYouDwellConfig extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Keeps each user's long dwells. Requires for_you.enabled and a plan with activity metrics
        public ?int $thresholdMs = null, // Minimum dwell_ms that counts as a long dwell. 1000 to 60000, defaults to 5000
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
