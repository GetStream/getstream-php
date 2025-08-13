<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a user's message get deleted. The event contains information about the user whose messages got deleted.
 */
class UserMessagesDeletedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $hardDelete = null,
        public ?bool $softDelete = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null,
        public ?string $channelID = null,
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $receivedAt = null,
        public ?string $team = null,
        public ?object $channelCustom = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'hard_delete' => $this->hardDelete,
            'soft_delete' => $this->softDelete,
            'custom' => $this->custom,
            'user' => $this->user,
            'type' => $this->type,
            'channel_id' => $this->channelID,
            'channel_member_count' => $this->channelMemberCount,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'received_at' => $this->receivedAt,
            'team' => $this->team,
            'channel_custom' => $this->channelCustom,
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
            hardDelete: $json['hard_delete'] ?? null,
            softDelete: $json['soft_delete'] ?? null,
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null,
            channelID: $json['channel_id'] ?? null,
            channelMemberCount: $json['channel_member_count'] ?? null,
            channelType: $json['channel_type'] ?? null,
            cid: $json['cid'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            team: $json['team'] ?? null,
            channelCustom: $json['channel_custom'] ?? null
        );
    }
} 
