<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Pending message event for async moderation
 */
class PendingMessageEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $method = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?Channel $channel = null,
        public ?Message $message = null,
        public ?array $metadata = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'method' => $this->method,
            'custom' => $this->custom,
            'type' => $this->type,
            'received_at' => $this->receivedAt,
            'channel' => $this->channel,
            'message' => $this->message,
            'metadata' => $this->metadata,
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
            method: $json['method'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            channel: $json['channel'] ?? null,
            message: $json['message'] ?? null,
            metadata: $json['metadata'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
