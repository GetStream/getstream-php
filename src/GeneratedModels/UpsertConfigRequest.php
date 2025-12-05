<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $key
 * @property bool|null $async
 * @property string|null $team
 * @property string|null $userID
 * @property AIImageConfig|null $aiImageConfig
 * @property AITextConfig|null $aiTextConfig
 * @property AIVideoConfig|null $aiVideoConfig
 * @property AutomodPlatformCircumventionConfig|null $automodPlatformCircumventionConfig
 * @property AutomodSemanticFiltersConfig|null $automodSemanticFiltersConfig
 * @property AutomodToxicityConfig|null $automodToxicityConfig
 * @property AIImageConfig|null $awsRekognitionConfig
 * @property BlockListConfig|null $blockListConfig
 * @property AITextConfig|null $bodyguardConfig
 * @property GoogleVisionConfig|null $googleVisionConfig
 * @property LLMConfig|null $llmConfig
 * @property RuleBuilderConfig|null $ruleBuilderConfig
 * @property UserRequest|null $user
 * @property VelocityFilterConfig|null $velocityFilterConfig
 * @property VideoCallRuleConfig|null $videoCallRuleConfig
 */
class UpsertConfigRequest extends BaseModel
{
    public function __construct(
        public ?string $key = null, // Unique identifier for the moderation configuration
        public ?bool $async = null, // Whether moderation should be performed asynchronously
        public ?string $team = null, // Team associated with the configuration
        public ?string $userID = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?AIImageConfig $awsRekognitionConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?AITextConfig $bodyguardConfig = null,
        public ?GoogleVisionConfig $googleVisionConfig = null,
        public ?LLMConfig $llmConfig = null,
        public ?RuleBuilderConfig $ruleBuilderConfig = null,
        public ?UserRequest $user = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
