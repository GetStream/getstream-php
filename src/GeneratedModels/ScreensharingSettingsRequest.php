<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ScreensharingSettingsRequest implements JsonSerializable
{
    public function __construct(public ?bool $accessRequestEnabled = null,
        public ?bool $enabled = null,
        public ?TargetResolution $targetResolution = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'access_request_enabled' => $this->accessRequestEnabled,
            'enabled' => $this->enabled,
            'target_resolution' => $this->targetResolution,
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
        
        return new static(accessRequestEnabled: $json['access_request_enabled'] ?? null,
            enabled: $json['enabled'] ?? null,
            targetResolution: $json['target_resolution'] ?? null
        );
    }
} 
