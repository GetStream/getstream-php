<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RuleBuilderRule implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $ruleType = null,
        public ?RuleBuilderAction $action = null,
        public ?string $cooldownPeriod = null,
        public ?string $logic = null,
        public ?array $conditions = null,
        public ?array $groups = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'id' => $this->id,
            'name' => $this->name,
            'rule_type' => $this->ruleType,
            'action' => $this->action,
            'cooldown_period' => $this->cooldownPeriod,
            'logic' => $this->logic,
            'conditions' => $this->conditions,
            'groups' => $this->groups,
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
            id: $json['id'] ?? null,
            name: $json['name'] ?? null,
            ruleType: $json['rule_type'] ?? null,
            action: $json['action'] ?? null,
            cooldownPeriod: $json['cooldown_period'] ?? null,
            logic: $json['logic'] ?? null,
            conditions: $json['conditions'] ?? null,
            groups: $json['groups'] ?? null
        );
    }
} 
