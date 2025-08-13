<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BanOptions implements JsonSerializable
{
    public function __construct(public ?int $duration = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadowBan = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'ip_ban' => $this->ipBan,
            'reason' => $this->reason,
            'shadow_ban' => $this->shadowBan,
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
        
        return new static(duration: $json['duration'] ?? null,
            ipBan: $json['ip_ban'] ?? null,
            reason: $json['reason'] ?? null,
            shadowBan: $json['shadow_ban'] ?? null
        );
    }
} 
