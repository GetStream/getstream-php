<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ClosedCaptionRuleParameters extends BaseModel
{
    public function __construct(
        public ?int $threshold = null,
        public ?array $harmLabels = null,
        public ?array $llmHarmLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
