<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ConfigResponse implements JsonSerializable
{
    public function __construct(public ?bool $async = null,
        public ?\DateTime $createdAt = null,
        public ?string $key = null,
        public ?string $team = null,
        public ?\DateTime $updatedAt = null,
        public ?AIImageConfig $aiImageConfig = null,
        public ?AITextConfig $aiTextConfig = null,
        public ?AIVideoConfig $aiVideoConfig = null,
        public ?AutomodPlatformCircumventionConfig $automodPlatformCircumventionConfig = null,
        public ?AutomodSemanticFiltersConfig $automodSemanticFiltersConfig = null,
        public ?AutomodToxicityConfig $automodToxicityConfig = null,
        public ?BlockListConfig $blockListConfig = null,
        public ?RuleBuilderConfig $ruleBuilderConfig = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'async' => $this->async,
            'created_at' => $this->createdAt,
            'key' => $this->key,
            'team' => $this->team,
            'updated_at' => $this->updatedAt,
            'ai_image_config' => $this->aiImageConfig,
            'ai_text_config' => $this->aiTextConfig,
            'ai_video_config' => $this->aiVideoConfig,
            'automod_platform_circumvention_config' => $this->automodPlatformCircumventionConfig,
            'automod_semantic_filters_config' => $this->automodSemanticFiltersConfig,
            'automod_toxicity_config' => $this->automodToxicityConfig,
            'block_list_config' => $this->blockListConfig,
            'rule_builder_config' => $this->ruleBuilderConfig,
            'velocity_filter_config' => $this->velocityFilterConfig,
            'video_call_rule_config' => $this->videoCallRuleConfig,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(async: $json['async'] ?? null,
            createdAt: $json['created_at'] ?? null,
            key: $json['key'] ?? null,
            team: $json['team'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            aiImageConfig: $json['ai_image_config'] ?? null,
            aiTextConfig: $json['ai_text_config'] ?? null,
            aiVideoConfig: $json['ai_video_config'] ?? null,
            automodPlatformCircumventionConfig: $json['automod_platform_circumvention_config'] ?? null,
            automodSemanticFiltersConfig: $json['automod_semantic_filters_config'] ?? null,
            automodToxicityConfig: $json['automod_toxicity_config'] ?? null,
            blockListConfig: $json['block_list_config'] ?? null,
            ruleBuilderConfig: $json['rule_builder_config'] ?? null,
            velocityFilterConfig: $json['velocity_filter_config'] ?? null,
            videoCallRuleConfig: $json['video_call_rule_config'] ?? null
        );
    }
} 
