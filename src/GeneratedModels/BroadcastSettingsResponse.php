<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * BroadcastSettingsResponse is the payload for broadcasting settings
 */
class BroadcastSettingsResponse implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?HLSSettingsResponse $hls = null,
        public ?RTMPSettingsResponse $rtmp = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'hls' => $this->hls,
            'rtmp' => $this->rtmp,
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
            hls: $json['hls'] ?? null,
            rtmp: $json['rtmp'] ?? null
        );
    }
} 
