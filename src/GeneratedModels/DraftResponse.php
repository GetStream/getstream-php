<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DraftResponse implements JsonSerializable
{
    public function __construct(public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?DraftPayloadResponse $message = null,
        public ?string $parentID = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $parentMessage = null,
        public ?MessageResponse $quotedMessage = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_cid' => $this->channelCid,
            'created_at' => $this->createdAt,
            'message' => $this->message,
            'parent_id' => $this->parentID,
            'channel' => $this->channel,
            'parent_message' => $this->parentMessage,
            'quoted_message' => $this->quotedMessage,
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
        
        return new static(channelCid: $json['channel_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            message: $json['message'] ?? null,
            parentID: $json['parent_id'] ?? null,
            channel: $json['channel'] ?? null,
            parentMessage: $json['parent_message'] ?? null,
            quotedMessage: $json['quoted_message'] ?? null
        );
    }
} 
