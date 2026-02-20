<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ConfigResponse extends BaseModel
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
        public ?AIImageConfig $aiImageConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?\DateTime $createdAt = null, // When the configuration was created
        public ?\DateTime $updatedAt = null, // When the configuration was last updated
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
        public ?array $supportedVideoCallHarmTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
