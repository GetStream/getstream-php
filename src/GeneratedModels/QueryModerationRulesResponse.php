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
        public ?array $keyframeLabels = null, // Deprecated: use keyframe_label_classifications instead. Available L1 harm labels for keyframe rules
        public ?array $keyframeLabelClassifications = null, // L1 to L2 mapping of keyframe harm label classifications
        public ?array $closedCaptionLabels = null, // Available harm labels for closed caption rules
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
