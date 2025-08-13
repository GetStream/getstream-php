<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a frame is captured from a call
 */
class CallFrameRecordingFrameReadyEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $capturedAt = null,
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?string $sessionID = null,
        public ?string $trackType = null,
        public ?string $url = null,
        public ?array $users = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'captured_at' => $this->capturedAt,
            'created_at' => $this->createdAt,
            'egress_id' => $this->egressID,
            'session_id' => $this->sessionID,
            'track_type' => $this->trackType,
            'url' => $this->url,
            'users' => $this->users,
            'type' => $this->type,
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
        
        return new static(callCid: $json['call_cid'] ?? null,
            capturedAt: $json['captured_at'] ?? null,
            createdAt: $json['created_at'] ?? null,
            egressID: $json['egress_id'] ?? null,
            sessionID: $json['session_id'] ?? null,
            trackType: $json['track_type'] ?? null,
            url: $json['url'] ?? null,
            users: $json['users'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
