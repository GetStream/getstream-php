<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RuleBuilderCondition implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?int $confidence = null,
        public ?ContentCountRuleParameters $contentCountRuleParams = null,
        public ?ImageContentParameters $imageContentParams = null,
        public ?ImageRuleParameters $imageRuleParams = null,
        public ?TextContentParameters $textContentParams = null,
        public ?TextRuleParameters $textRuleParams = null,
        public ?UserCreatedWithinParameters $userCreatedWithinParams = null,
        public ?UserRuleParameters $userRuleParams = null,
        public ?VideoContentParameters $videoContentParams = null,
        public ?VideoRuleParameters $videoRuleParams = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'confidence' => $this->confidence,
            'content_count_rule_params' => $this->contentCountRuleParams,
            'image_content_params' => $this->imageContentParams,
            'image_rule_params' => $this->imageRuleParams,
            'text_content_params' => $this->textContentParams,
            'text_rule_params' => $this->textRuleParams,
            'user_created_within_params' => $this->userCreatedWithinParams,
            'user_rule_params' => $this->userRuleParams,
            'video_content_params' => $this->videoContentParams,
            'video_rule_params' => $this->videoRuleParams,
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
        
        return new static(type: $json['type'] ?? null,
            confidence: $json['confidence'] ?? null,
            contentCountRuleParams: $json['content_count_rule_params'] ?? null,
            imageContentParams: $json['image_content_params'] ?? null,
            imageRuleParams: $json['image_rule_params'] ?? null,
            textContentParams: $json['text_content_params'] ?? null,
            textRuleParams: $json['text_rule_params'] ?? null,
            userCreatedWithinParams: $json['user_created_within_params'] ?? null,
            userRuleParams: $json['user_rule_params'] ?? null,
            videoContentParams: $json['video_content_params'] ?? null,
            videoRuleParams: $json['video_rule_params'] ?? null
        );
    }
} 
