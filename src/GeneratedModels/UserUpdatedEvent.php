<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a user gets updated. The event contains information about the updated user.
 */
class UserUpdatedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?UserResponsePrivacyFields $user = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'custom' => $this->custom,
            'user' => $this->user,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
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
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null
        );
    }
} 
