<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentConditionInfo extends BaseModel
{
    public function __construct(
        public ?string $topic = null, // Policy intent topic label the condition references.
        public ?int $threshold = null, // Minimum score (1-100) the condition requires.
        public ?int $score = null, // Final (damped) score of the topic in this analysis; 0 when the topic is not defined in the policy.
        public ?bool $passed = null, // Whether the score reached the threshold.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
