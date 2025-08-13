<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CampaignStatsResponse implements JsonSerializable
{
    public function __construct(public ?int $progress = null,
        public ?int $statsChannelsCreated = null,
        public ?\DateTime $statsCompletedAt = null,
        public ?int $statsMessagesSent = null,
        public ?\DateTime $statsStartedAt = null,
        public ?int $statsUsersRead = null,
        public ?int $statsUsersSent = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'progress' => $this->progress,
            'stats_channels_created' => $this->statsChannelsCreated,
            'stats_completed_at' => $this->statsCompletedAt,
            'stats_messages_sent' => $this->statsMessagesSent,
            'stats_started_at' => $this->statsStartedAt,
            'stats_users_read' => $this->statsUsersRead,
            'stats_users_sent' => $this->statsUsersSent,
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
        
        return new static(progress: $json['progress'] ?? null,
            statsChannelsCreated: $json['stats_channels_created'] ?? null,
            statsCompletedAt: $json['stats_completed_at'] ?? null,
            statsMessagesSent: $json['stats_messages_sent'] ?? null,
            statsStartedAt: $json['stats_started_at'] ?? null,
            statsUsersRead: $json['stats_users_read'] ?? null,
            statsUsersSent: $json['stats_users_sent'] ?? null
        );
    }
} 
