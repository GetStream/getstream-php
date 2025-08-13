<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSession implements JsonSerializable
{
    public function __construct(public ?int $anonymousParticipantCount = null,
        public ?int $appPK = null,
        public ?string $callID = null,
        public ?string $callType = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null,
        public ?array $activeSFUs = null,
        public ?array $participants = null,
        public ?array $sFUIDs = null,
        public ?array $acceptedBy = null,
        public ?array $missedBy = null,
        public ?array $participantsCountByRole = null,
        public ?array $rejectedBy = null,
        public ?array $userPermissionOverrides = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $endedAt = null,
        public ?\DateTime $liveEndedAt = null,
        public ?\DateTime $liveStartedAt = null,
        public ?\DateTime $ringAt = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $timerEndsAt = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'AnonymousParticipantCount' => $this->anonymousParticipantCount,
            'AppPK' => $this->appPK,
            'CallID' => $this->callID,
            'CallType' => $this->callType,
            'CreatedAt' => $this->createdAt,
            'SessionID' => $this->sessionID,
            'ActiveSFUs' => $this->activeSFUs,
            'Participants' => $this->participants,
            'SFUIDs' => $this->sFUIDs,
            'AcceptedBy' => $this->acceptedBy,
            'MissedBy' => $this->missedBy,
            'ParticipantsCountByRole' => $this->participantsCountByRole,
            'RejectedBy' => $this->rejectedBy,
            'UserPermissionOverrides' => $this->userPermissionOverrides,
            'DeletedAt' => $this->deletedAt,
            'EndedAt' => $this->endedAt,
            'LiveEndedAt' => $this->liveEndedAt,
            'LiveStartedAt' => $this->liveStartedAt,
            'RingAt' => $this->ringAt,
            'StartedAt' => $this->startedAt,
            'TimerEndsAt' => $this->timerEndsAt,
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
        
        return new static(anonymousParticipantCount: $json['AnonymousParticipantCount'] ?? null,
            appPK: $json['AppPK'] ?? null,
            callID: $json['CallID'] ?? null,
            callType: $json['CallType'] ?? null,
            createdAt: $json['CreatedAt'] ?? null,
            sessionID: $json['SessionID'] ?? null,
            activeSFUs: $json['ActiveSFUs'] ?? null,
            participants: $json['Participants'] ?? null,
            sFUIDs: $json['SFUIDs'] ?? null,
            acceptedBy: $json['AcceptedBy'] ?? null,
            missedBy: $json['MissedBy'] ?? null,
            participantsCountByRole: $json['ParticipantsCountByRole'] ?? null,
            rejectedBy: $json['RejectedBy'] ?? null,
            userPermissionOverrides: $json['UserPermissionOverrides'] ?? null,
            deletedAt: $json['DeletedAt'] ?? null,
            endedAt: $json['EndedAt'] ?? null,
            liveEndedAt: $json['LiveEndedAt'] ?? null,
            liveStartedAt: $json['LiveStartedAt'] ?? null,
            ringAt: $json['RingAt'] ?? null,
            startedAt: $json['StartedAt'] ?? null,
            timerEndsAt: $json['TimerEndsAt'] ?? null
        );
    }
} 
