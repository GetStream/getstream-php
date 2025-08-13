<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelUpdatedEvent implements JsonSerializable
{
    public function __construct(public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?string $team = null,
        public ?ChannelResponse $channel = null,
        public ?Message $message = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_id' => $this->channelID,
            'channel_member_count' => $this->channelMemberCount,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'team' => $this->team,
            'channel' => $this->channel,
            'message' => $this->message,
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
            channelMemberCount: $json['channel_member_count'] ?? null,
            channelType: $json['channel_type'] ?? null,
            cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            type: $json['type'] ?? null,
            team: $json['team'] ?? null,
            channel: $json['channel'] ?? null,
            message: $json['message'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
