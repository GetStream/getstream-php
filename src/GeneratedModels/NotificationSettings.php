<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationSettings implements JsonSerializable
{
    public function __construct(public ?bool $enabled = null,
        public ?EventNotificationSettings $callLiveStarted = null,
        public ?EventNotificationSettings $callMissed = null,
        public ?EventNotificationSettings $callNotification = null,
        public ?EventNotificationSettings $callRing = null,
        public ?EventNotificationSettings $sessionStarted = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'enabled' => $this->enabled,
            'call_live_started' => $this->callLiveStarted,
            'call_missed' => $this->callMissed,
            'call_notification' => $this->callNotification,
            'call_ring' => $this->callRing,
            'session_started' => $this->sessionStarted,
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
        
        return new static(enabled: $json['enabled'] ?? null,
            callLiveStarted: $json['call_live_started'] ?? null,
            callMissed: $json['call_missed'] ?? null,
            callNotification: $json['call_notification'] ?? null,
            callRing: $json['call_ring'] ?? null,
            sessionStarted: $json['session_started'] ?? null
        );
    }
} 
