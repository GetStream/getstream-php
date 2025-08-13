<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a feed member is removed.
 */
class FeedMemberRemovedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $fid = null,
        public ?string $memberID = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null,
        public ?UserResponseCommonFields $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'fid' => $this->fid,
            'member_id' => $this->memberID,
            'custom' => $this->custom,
            'type' => $this->type,
            'feed_visibility' => $this->feedVisibility,
            'received_at' => $this->receivedAt,
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
            fid: $json['fid'] ?? null,
            memberID: $json['member_id'] ?? null,
            custom: $json['custom'] ?? null,
            type: $json['type'] ?? null,
            feedVisibility: $json['feed_visibility'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
