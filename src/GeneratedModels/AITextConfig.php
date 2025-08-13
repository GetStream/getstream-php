<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AITextConfig implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?string $profile = null,
        public ?array $rules = null,
        public ?array $severityRules = null,
        public ?bool $async = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'profile' => $this->profile,
            'rules' => $this->rules,
            'severity_rules' => $this->severityRules,
            'async' => $this->async,
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
        
        return new static(enabled: $json['enabled'] ?? null,
            profile: $json['profile'] ?? null,
            rules: $json['rules'] ?? null,
            severityRules: $json['severity_rules'] ?? null,
            async: $json['async'] ?? null
        );
    }
} 
