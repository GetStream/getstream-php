<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TextContentParameters extends BaseModel
{
    public function __construct(
        public ?array $harmLabels = null,
        public ?array $llmHarmLabels = null,
        public ?bool $containsUrl = null,
        public ?string $severity = null,
        public ?array $blocklistMatch = null,
        public ?string $labelOperator = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
