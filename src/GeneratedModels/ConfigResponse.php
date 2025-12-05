<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $async
 * @property \DateTime $createdAt
 * @property string $key
 * @property string $team
 * @property \DateTime $updatedAt
 * @property array $supportedVideoCallHarmTypes
 * @property AIImageConfig|null $aiImageConfig
 * @property AITextConfig|null $aiTextConfig
 * @property AIVideoConfig|null $aiVideoConfig
 * @property AutomodPlatformCircumventionConfig|null $automodPlatformCircumventionConfig
 * @property AutomodSemanticFiltersConfig|null $automodSemanticFiltersConfig
 * @property AutomodToxicityConfig|null $automodToxicityConfig
 * @property BlockListConfig|null $blockListConfig
 * @property LLMConfig|null $llmConfig
 * @property VelocityFilterConfig|null $velocityFilterConfig
 * @property VideoCallRuleConfig|null $videoCallRuleConfig
 */
class ConfigResponse extends BaseModel
{
    public function __construct(
        public ?bool $async = null, // Whether moderation should be performed asynchronously
        public ?\DateTime $createdAt = null, // When the configuration was created
        public ?string $key = null, // Unique identifier for the moderation configuration
        public ?string $team = null, // Team associated with the configuration
        public ?\DateTime $updatedAt = null, // When the configuration was last updated
        public ?array $supportedVideoCallHarmTypes = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?LLMConfig $llmConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
