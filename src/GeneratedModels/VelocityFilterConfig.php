<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VelocityFilterConfig implements JsonSerializable
{
    public function __construct(public ?bool $advancedFilters = null,
        public ?bool $cascadingActions = null,
        public ?int $cidsPerUser = null,
        public ?bool $enabled = null,
        public ?bool $firstMessageOnly = null,
        public ?array $rules = null,
        public ?bool $async = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'advanced_filters' => $this->advancedFilters,
            'cascading_actions' => $this->cascadingActions,
            'cids_per_user' => $this->cidsPerUser,
            'enabled' => $this->enabled,
            'first_message_only' => $this->firstMessageOnly,
            'rules' => $this->rules,
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
        
        return new static(advancedFilters: $json['advanced_filters'] ?? null,
            cascadingActions: $json['cascading_actions'] ?? null,
            cidsPerUser: $json['cids_per_user'] ?? null,
            enabled: $json['enabled'] ?? null,
            firstMessageOnly: $json['first_message_only'] ?? null,
            rules: $json['rules'] ?? null,
            async: $json['async'] ?? null
        );
    }
} 
