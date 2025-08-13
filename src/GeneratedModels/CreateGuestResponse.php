<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreateGuestResponse implements JsonSerializable
{
    public function __construct(public ?string $accessToken = null,
        public ?string $duration = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'access_token' => $this->accessToken,
            'duration' => $this->duration,
            'user' => $this->user,
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
        
        return new static(accessToken: $json['access_token'] ?? null,
            duration: $json['duration'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
