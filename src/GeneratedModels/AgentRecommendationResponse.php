<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AgentRecommendationResponse extends BaseModel
{
    public function __construct(
        public ?string $recommendedAction = null, // Action Nora suggested for the item
        public ?string $reason = null, // Why Nora suggested this action
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
