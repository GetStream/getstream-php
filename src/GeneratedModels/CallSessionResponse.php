<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSessionResponse implements JsonSerializable
{
    public function __construct(public ?int $anonymousParticipantCount = null,
        public ?string $id = null,
        public ?array $participants = null,
        public ?array $acceptedBy = null,
        public ?array $missedBy = null,
        public ?array $participantsCountByRole = null,
        public ?array $rejectedBy = null,
        public ?\DateTime $endedAt = null,
        public ?\DateTime $liveEndedAt = null,
        public ?\DateTime $liveStartedAt = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $timerEndsAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'anonymous_participant_count' => $this->anonymousParticipantCount,
            'id' => $this->id,
            'participants' => $this->participants,
            'accepted_by' => $this->acceptedBy,
            'missed_by' => $this->missedBy,
            'participants_count_by_role' => $this->participantsCountByRole,
            'rejected_by' => $this->rejectedBy,
            'ended_at' => $this->endedAt,
            'live_ended_at' => $this->liveEndedAt,
            'live_started_at' => $this->liveStartedAt,
            'started_at' => $this->startedAt,
            'timer_ends_at' => $this->timerEndsAt,
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
            id: $json['id'] ?? null,
            participants: $json['participants'] ?? null,
            acceptedBy: $json['accepted_by'] ?? null,
            missedBy: $json['missed_by'] ?? null,
            participantsCountByRole: $json['participants_count_by_role'] ?? null,
            rejectedBy: $json['rejected_by'] ?? null,
            endedAt: $json['ended_at'] ?? null,
            liveEndedAt: $json['live_ended_at'] ?? null,
            liveStartedAt: $json['live_started_at'] ?? null,
            startedAt: $json['started_at'] ?? null,
            timerEndsAt: $json['timer_ends_at'] ?? null
        );
    }
} 
