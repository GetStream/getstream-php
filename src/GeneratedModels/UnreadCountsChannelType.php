<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnreadCountsChannelType implements JsonSerializable
{
    public function __construct(public ?int $channelCount = null,
        public ?string $channelType = null,
        public ?int $unreadCount = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_count' => $this->channelCount,
            'channel_type' => $this->channelType,
            'unread_count' => $this->unreadCount,
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
        
        return new static(channelCount: $json['channel_count'] ?? null,
            channelType: $json['channel_type'] ?? null,
            unreadCount: $json['unread_count'] ?? null
        );
    }
} 
