<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class WrappedUnreadCountsResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?int $totalUnreadCount = null,
        public ?int $totalUnreadThreadsCount = null,
        public ?array $channelType = null,
        public ?array $channels = null,
        public ?array $threads = null,
        public ?array $totalUnreadCountByTeam = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'total_unread_count' => $this->totalUnreadCount,
            'total_unread_threads_count' => $this->totalUnreadThreadsCount,
            'channel_type' => $this->channelType,
            'channels' => $this->channels,
            'threads' => $this->threads,
            'total_unread_count_by_team' => $this->totalUnreadCountByTeam,
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
        
        return new static(duration: $json['duration'] ?? null,
            totalUnreadCount: $json['total_unread_count'] ?? null,
            totalUnreadThreadsCount: $json['total_unread_threads_count'] ?? null,
            channelType: $json['channel_type'] ?? null,
            channels: $json['channels'] ?? null,
            threads: $json['threads'] ?? null,
            totalUnreadCountByTeam: $json['total_unread_count_by_team'] ?? null
        );
    }
} 
