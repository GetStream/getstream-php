<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForYouExplorationConfig extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Turns the exploration slot on. Requires for_you.enabled and a plan with activity metrics
        public ?int $slot = null, // 1-based position in the ranked list that receives the exploration activity. 1 to 100, defaults to 15
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
