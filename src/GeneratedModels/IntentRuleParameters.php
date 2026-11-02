<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * intent_rule params: policy intent topic label and the minimum final score (1-100) that fires the condition
 */
class IntentRuleParameters extends BaseModel
{
    public function __construct(
        public ?string $topic = null,
        public ?int $threshold = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
