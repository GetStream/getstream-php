<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MemberRemovedEvent implements JsonSerializable
{
    public function __construct(public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        public ?ChannelMember $member = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_id' => $this->channelID,
            'channel_type' => $this->channelType,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'type' => $this->type,
            'member' => $this->member,
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
            member: $json['member'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
