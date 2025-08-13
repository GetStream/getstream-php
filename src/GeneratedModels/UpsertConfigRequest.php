<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertConfigRequest implements JsonSerializable
{
    public function __construct(public ?string $key = null,
        public ?bool $async = null,
        public ?string $team = null,
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
        public ?RuleBuilderConfig $ruleBuilderConfig = null,
        public ?UserRequest $user = null,
        public ?VelocityFilterConfig $velocityFilterConfig = null,
        public ?VideoCallRuleConfig $videoCallRuleConfig = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'key' => $this->key,
            'async' => $this->async,
            'team' => $this->team,
            'user_id' => $this->userID,
            'ai_image_config' => $this->aiImageConfig,
            'ai_text_config' => $this->aiTextConfig,
            'ai_video_config' => $this->aiVideoConfig,
            'automod_platform_circumvention_config' => $this->automodPlatformCircumventionConfig,
            'automod_semantic_filters_config' => $this->automodSemanticFiltersConfig,
            'automod_toxicity_config' => $this->automodToxicityConfig,
            'aws_rekognition_config' => $this->awsRekognitionConfig,
            'block_list_config' => $this->blockListConfig,
            'bodyguard_config' => $this->bodyguardConfig,
            'google_vision_config' => $this->googleVisionConfig,
            'rule_builder_config' => $this->ruleBuilderConfig,
            'user' => $this->user,
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
        
        return new static(key: $json['key'] ?? null,
            async: $json['async'] ?? null,
            team: $json['team'] ?? null,
            userID: $json['user_id'] ?? null,
            aiImageConfig: $json['ai_image_config'] ?? null,
            aiTextConfig: $json['ai_text_config'] ?? null,
            aiVideoConfig: $json['ai_video_config'] ?? null,
            automodPlatformCircumventionConfig: $json['automod_platform_circumvention_config'] ?? null,
            automodSemanticFiltersConfig: $json['automod_semantic_filters_config'] ?? null,
            automodToxicityConfig: $json['automod_toxicity_config'] ?? null,
            awsRekognitionConfig: $json['aws_rekognition_config'] ?? null,
            blockListConfig: $json['block_list_config'] ?? null,
            bodyguardConfig: $json['bodyguard_config'] ?? null,
            googleVisionConfig: $json['google_vision_config'] ?? null,
            ruleBuilderConfig: $json['rule_builder_config'] ?? null,
            user: $json['user'] ?? null,
            velocityFilterConfig: $json['velocity_filter_config'] ?? null,
            videoCallRuleConfig: $json['video_call_rule_config'] ?? null
        );
    }
} 
