<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageReadEvent implements JsonSerializable
{
    public function __construct(public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?\DateTime $channelLastMessageAt = null,
        public ?string $lastReadMessageID = null,
        public ?string $team = null,
        public ?ThreadResponse $thread = null,
        public ?UserResponseCommonFields $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_id' => $this->channelID,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'channel_last_message_at' => $this->channelLastMessageAt,
            'last_read_message_id' => $this->lastReadMessageID,
            'team' => $this->team,
            'thread' => $this->thread,
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
        
        return new static(channelID: $json['channel_id'] ?? null,
            channelType: $json['channel_type'] ?? null,
            cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            type: $json['type'] ?? null,
            channelLastMessageAt: $json['channel_last_message_at'] ?? null,
            lastReadMessageID: $json['last_read_message_id'] ?? null,
            team: $json['team'] ?? null,
            thread: $json['thread'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
