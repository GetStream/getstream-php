<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetRateLimitsResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?array $android = null,
        public ?array $ios = null,
        public ?array $serverSide = null,
        public ?array $web = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'android' => $this->android,
            'ios' => $this->ios,
            'server_side' => $this->serverSide,
            'web' => $this->web,
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
            android: $json['android'] ?? null,
            ios: $json['ios'] ?? null,
            serverSide: $json['server_side'] ?? null,
            web: $json['web'] ?? null
        );
    }
} 
