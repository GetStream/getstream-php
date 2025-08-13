<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PendingMessageResponse implements JsonSerializable
{
    public function __construct(public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?array $metadata = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
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
        
        return new static(channel: $json['channel'] ?? null,
            message: $json['message'] ?? null,
            metadata: $json['metadata'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
