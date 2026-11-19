<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AgentReviewJudgmentResponse extends BaseModel
{
    public function __construct(
        public ?string $label = null, // Moderation label this judgment is about
        public ?string $verdict = null, // The agent's verdict for this label
        public ?array $evidence = null, // Quotes from the content that support the verdict
        public ?string $explanation = null, // Why the agent matched this label
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
