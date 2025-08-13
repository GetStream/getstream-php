<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when the participant counts in a call session are updated
 */
class CallSessionParticipantCountsUpdatedEvent implements JsonSerializable
{
    public function __construct(public ?int $anonymousParticipantCount = null,
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null,
        public ?array $participantsCountByRole = null,
        public ?string $type = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'anonymous_participant_count' => $this->anonymousParticipantCount,
            'call_cid' => $this->callCid,
            'created_at' => $this->createdAt,
            'session_id' => $this->sessionID,
            'participants_count_by_role' => $this->participantsCountByRole,
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
        
        return new static(anonymousParticipantCount: $json['anonymous_participant_count'] ?? null,
            callCid: $json['call_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            sessionID: $json['session_id'] ?? null,
            participantsCountByRole: $json['participants_count_by_role'] ?? null,
            type: $json['type'] ?? null
        );
    }
} 
