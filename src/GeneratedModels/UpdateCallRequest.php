<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request for updating a call
 */
class UpdateCallRequest implements JsonSerializable
{
    public function __construct(public ?\DateTime $startsAt = null,
        public ?object $custom = null,
        public ?CallSettingsRequest $settingsOverride = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'starts_at' => $this->startsAt,
            'custom' => $this->custom,
            'settings_override' => $this->settingsOverride,
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
        
        return new static(startsAt: $json['starts_at'] ?? null,
            custom: $json['custom'] ?? null,
            settingsOverride: $json['settings_override'] ?? null
        );
    }
} 
