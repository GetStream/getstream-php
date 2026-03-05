<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationConfig extends BaseModel
{
    public function __construct(
        public ?string $key = null,
        public ?string $team = null,
        public ?bool $async = null,
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?BodyguardImageAnalysisConfig $aiImageLiteConfig = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?GoogleVisionConfig $googleVisionConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?LLMConfig $llmConfig = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
        public ?array $supportedVideoCallHarmTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
