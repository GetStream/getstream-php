<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TextRuleParameters extends BaseModel
{
    public function __construct(
        public ?bool $containsUrl = null,
        public ?int $semanticFilterMinThreshold = null,
        public ?string $severity = null,
        public ?int $threshold = null,
        public ?string $timeWindow = null,
        public ?array $blocklistMatch = null,
        public ?array $harmLabels = null,
        public ?array $semanticFilterNames = null,
        public ?array $llmHarmLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
