<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryModerationRulesResponse extends BaseModel
{
    public function __construct(
        /** @var array<ModerationRuleV2Response>|null */
        #[ArrayOf(ModerationRuleV2Response::class)]
        public ?array $rules = null, // List of moderation rules
        public ?array $defaultLlmLabels = null, // Default LLM label descriptions
        public ?array $defaultUsernameLlmLabels = null, // Recommended LLM label descriptions for username-scoped policies (key starts with 'username:'). Used by /moderation/v2/labels fast-path.
        public ?array $keyframeLabels = null, // Deprecated: use keyframe_label_classifications instead. Available L1 harm labels for keyframe rules
        public ?array $keyframeLabelClassifications = null, // L1 to L2 mapping of keyframe harm label classifications
        public ?array $closedCaptionLabels = null, // Available harm labels for closed caption rules
        public ?array $ocrLabels = null, // Available harm labels for OCR-based rule conditions (keyframe_ocr_rule and ocr_content). Mirrors `closed_caption_labels` today but kept as a separate field so the pickers can diverge later.
        /** @var array<AIImageLabelDefinition>|null */
        #[ArrayOf(AIImageLabelDefinition::class)]
        public ?array $aiImageLabelDefinitions = null, // AI image label definitions with metadata for dashboard rendering
        public ?array $aiImageSubclassifications = null, // Stream L1 to leaf-level label name mapping for AI image rules
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
