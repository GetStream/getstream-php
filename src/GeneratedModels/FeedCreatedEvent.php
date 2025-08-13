<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when a feed is created.
 */
class FeedCreatedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $fid = null,
        public ?array $members = null,
        public ?object $custom = null,
        public ?FeedResponse $feed = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null,
        public ?string $feedVisibility = null,
        public ?\DateTime $receivedAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'fid' => $this->fid,
            'members' => $this->members,
            'custom' => $this->custom,
            'feed' => $this->feed,
            'user' => $this->user,
            'type' => $this->type,
            'feed_visibility' => $this->feedVisibility,
            'received_at' => $this->receivedAt,
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
            members: $json['members'] ?? null,
            custom: $json['custom'] ?? null,
            feed: $json['feed'] ?? null,
            user: $json['user'] ?? null,
            type: $json['type'] ?? null,
            feedVisibility: $json['feed_visibility'] ?? null,
            receivedAt: $json['received_at'] ?? null
        );
    }
} 
