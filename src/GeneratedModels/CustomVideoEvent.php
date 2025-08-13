<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * A custom event, this event is used to send custom events to other participants in the call.
 */
class CustomVideoEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?UserResponse $user = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'custom' => $this->custom,
            'user' => $this->user,
            'type' => $this->type,
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
        
        return new static(callCid: $json['call_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
