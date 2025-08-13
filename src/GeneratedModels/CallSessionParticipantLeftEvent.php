<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a participant leaves a call session
 */
class CallSessionParticipantLeftEvent implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?int $durationSeconds = null,
        public ?string $sessionID = null,
        public ?CallParticipantResponse $participant = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'duration_seconds' => $this->durationSeconds,
            'session_id' => $this->sessionID,
            'participant' => $this->participant,
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
            createdAt: $json['created_at'] ?? null,
            durationSeconds: $json['duration_seconds'] ?? null,
            sessionID: $json['session_id'] ?? null,
            participant: $json['participant'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
