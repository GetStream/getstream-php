<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserUnreadReminderEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?array $channels = null,
        public ?string $type = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'channels' => $this->channels,
            'type' => $this->type,
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
            channels: $json['channels'] ?? null,
            type: $json['type'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
