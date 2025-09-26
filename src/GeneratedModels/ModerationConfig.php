<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        public ?\DateTime $createdAt = null,
        public ?string $key = null,
        public ?string $team = null,
        public ?\DateTime $updatedAt = null,
        public ?array $supportedVideoCallHarmTypes = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?BodyguardImageAnalysisConfig $aiImageLiteConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?GoogleVisionConfig $googleVisionConfig = null,
        public ?LLMConfig $llmConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
