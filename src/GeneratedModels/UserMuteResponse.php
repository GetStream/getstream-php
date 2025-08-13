<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserMuteResponse implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $expires = null,
        public ?UserResponse $target = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'expires' => $this->expires,
            'target' => $this->target,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            expires: $json['expires'] ?? null,
            target: $json['target'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
