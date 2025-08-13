<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActionSequence implements JsonSerializable
{
    public function __construct(public ?string $action = null,
        public ?bool $blur = null,
        public ?int $cooldownPeriod = null,
        public ?int $threshold = null,
        public ?int $timeWindow = null,
        public ?bool $warning = null,
        public ?string $warningText = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action' => $this->action,
            'blur' => $this->blur,
            'cooldown_period' => $this->cooldownPeriod,
            'threshold' => $this->threshold,
            'time_window' => $this->timeWindow,
            'warning' => $this->warning,
            'warning_text' => $this->warningText,
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
            blur: $json['blur'] ?? null,
            cooldownPeriod: $json['cooldown_period'] ?? null,
            threshold: $json['threshold'] ?? null,
            timeWindow: $json['time_window'] ?? null,
            warning: $json['warning'] ?? null,
            warningText: $json['warning_text'] ?? null
        );
    }
} 
