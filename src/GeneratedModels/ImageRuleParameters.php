<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImageRuleParameters implements JsonSerializable
{
    public function __construct(public ?int $threshold = null,
        public ?string $timeWindow = null,
        public ?array $harmLabels = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'threshold' => $this->threshold,
            'time_window' => $this->timeWindow,
            'harm_labels' => $this->harmLabels,
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
        
        return new static(threshold: $json['threshold'] ?? null,
            timeWindow: $json['time_window'] ?? null,
            harmLabels: $json['harm_labels'] ?? null
        );
    }
} 
