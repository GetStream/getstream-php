<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationConfig implements JsonSerializable
{
    public function __construct(public ?bool $trackRead = null,
        public ?bool $trackSeen = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'track_read' => $this->trackRead,
            'track_seen' => $this->trackSeen,
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
        
        return new static(trackRead: $json['track_read'] ?? null,
            trackSeen: $json['track_seen'] ?? null
        );
    }
} 
