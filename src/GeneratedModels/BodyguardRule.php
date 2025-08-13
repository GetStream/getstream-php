<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BodyguardRule implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?string $label = null,
        public ?array $severityRules = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'label' => $this->label,
            'severity_rules' => $this->severityRules,
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
        
        return new static(action: $json['action'] ?? null,
            label: $json['label'] ?? null,
            severityRules: $json['severity_rules'] ?? null
        );
    }
} 
