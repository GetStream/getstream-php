<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationStatusResponse implements JsonSerializable
{
    public function __construct(public ?int $unread = null,
        public ?int $unseen = null,
        public ?\DateTime $lastReadAt = null,
        public ?\DateTime $lastSeenAt = null,
        public ?array $readActivities = null,
        public ?array $seenActivities = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'unread' => $this->unread,
            'unseen' => $this->unseen,
            'last_read_at' => $this->lastReadAt,
            'last_seen_at' => $this->lastSeenAt,
            'read_activities' => $this->readActivities,
            'seen_activities' => $this->seenActivities,
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
        
        return new static(unread: $json['unread'] ?? null,
            unseen: $json['unseen'] ?? null,
            lastReadAt: $json['last_read_at'] ?? null,
            lastSeenAt: $json['last_seen_at'] ?? null,
            readActivities: $json['read_activities'] ?? null,
            seenActivities: $json['seen_activities'] ?? null
        );
    }
} 
