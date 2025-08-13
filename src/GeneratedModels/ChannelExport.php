<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelExport implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?string $id = null,
        public ?\DateTime $messagesSince = null,
        public ?\DateTime $messagesUntil = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'id' => $this->id,
            'messages_since' => $this->messagesSince,
            'messages_until' => $this->messagesUntil,
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
        
        return new static(cid: $json['cid'] ?? null,
            id: $json['id'] ?? null,
            messagesSince: $json['messages_since'] ?? null,
            messagesUntil: $json['messages_until'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
