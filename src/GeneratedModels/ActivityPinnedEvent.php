<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Emitted when an activity is pinned.
 */
class ActivityPinnedEvent implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $fid = null,
        public ?object $custom = null,
        public ?PinActivityResponse $pinnedActivity = null,
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
            'custom' => $this->custom,
            'pinned_activity' => $this->pinnedActivity,
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
            custom: $json['custom'] ?? null,
            pinnedActivity: $json['pinned_activity'] ?? null,
            type: $json['type'] ?? null,
            feedVisibility: $json['feed_visibility'] ?? null,
            receivedAt: $json['received_at'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
