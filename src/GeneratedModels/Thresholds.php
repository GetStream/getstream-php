<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Sets thresholds for AI moderation
 */
class Thresholds implements JsonSerializable
{
    public function __construct(public ?LabelThresholds $explicit = null,
        public ?LabelThresholds $spam = null,
        public ?LabelThresholds $toxic = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'explicit' => $this->explicit,
            'spam' => $this->spam,
            'toxic' => $this->toxic,
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
        
        return new static(explicit: $json['explicit'] ?? null,
            spam: $json['spam'] ?? null,
            toxic: $json['toxic'] ?? null
        );
    }
} 
