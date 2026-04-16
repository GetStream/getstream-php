<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertConfigRequest extends BaseModel
{
    public function __construct(
        public ?string $key = null, // Unique identifier for the moderation configuration
        public ?string $team = null, // Team associated with the configuration
        public ?bool $async = null, // Whether moderation should be performed asynchronously
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?LLMConfig $llmConfig = null,
        public ?GoogleVisionConfig $googleVisionConfig = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?RuleBuilderConfig $ruleBuilderConfig = null,
        public ?AITextConfig $bodyguardConfig = null,
        public ?AIImageConfig $awsRekognitionConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
        public ?string $userID = null, // Optional user ID to associate with the audit log entry
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
