<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CheckSNSRequest implements JsonSerializable
{
    public function __construct(public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?string $snsTopicArn = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'sns_key' => $this->snsKey,
            'sns_secret' => $this->snsSecret,
            'sns_topic_arn' => $this->snsTopicArn,
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
        
        return new static(snsKey: $json['sns_key'] ?? null,
            snsSecret: $json['sns_secret'] ?? null,
            snsTopicArn: $json['sns_topic_arn'] ?? null
        );
    }
} 
