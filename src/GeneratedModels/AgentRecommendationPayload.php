<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AgentRecommendationPayload extends BaseModel
{
    public function __construct(
        public ?string $recommendedAction = null, // Action Nora suggests for the item
        public ?string $reason = null, // Why Nora suggests this action. Stored on the action log, cut to 500 bytes
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
