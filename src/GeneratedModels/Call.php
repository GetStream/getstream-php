<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class Call implements JsonSerializable
{
    public function __construct(public ?int $appPK = null,
        public ?bool $backstage = null,
        public ?string $cID = null,
        public ?string $channelCID = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByUserID = null,
        public ?string $currentSessionID = null,
        public ?string $iD = null,
        public ?string $lastSessionID = null,
        public ?string $team = null,
        public ?string $thumbnailURL = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?array $blockedUserIDs = null,
        public ?array $blockedUsers = null,
        public ?array $egresses = null,
        public ?array $members = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $egressUpdatedAt = null,
        public ?\DateTime $endedAt = null,
        public ?int $joinAheadTimeSeconds = null,
        public ?\DateTime $lastHeartbeatAt = null,
        public ?int $memberCount = null,
        public ?\DateTime $startsAt = null,
        public ?CallType $callType = null,
        public ?User $createdBy = null,
        public ?MemberLookup $memberLookup = null,
        public ?CallSession $session = null,
        public ?CallSettings $settings = null,
        public ?CallSettings $settingsOverrides = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'AppPK' => $this->appPK,
            'Backstage' => $this->backstage,
            'CID' => $this->cID,
            'ChannelCID' => $this->channelCID,
            'CreatedAt' => $this->createdAt,
            'CreatedByUserID' => $this->createdByUserID,
            'CurrentSessionID' => $this->currentSessionID,
            'ID' => $this->iD,
            'LastSessionID' => $this->lastSessionID,
            'Team' => $this->team,
            'ThumbnailURL' => $this->thumbnailURL,
            'Type' => $this->type,
            'UpdatedAt' => $this->updatedAt,
            'BlockedUserIDs' => $this->blockedUserIDs,
            'BlockedUsers' => $this->blockedUsers,
            'Egresses' => $this->egresses,
            'Members' => $this->members,
            'Custom' => $this->custom,
            'DeletedAt' => $this->deletedAt,
            'EgressUpdatedAt' => $this->egressUpdatedAt,
            'EndedAt' => $this->endedAt,
            'JoinAheadTimeSeconds' => $this->joinAheadTimeSeconds,
            'LastHeartbeatAt' => $this->lastHeartbeatAt,
            'MemberCount' => $this->memberCount,
            'StartsAt' => $this->startsAt,
            'CallType' => $this->callType,
            'CreatedBy' => $this->createdBy,
            'MemberLookup' => $this->memberLookup,
            'Session' => $this->session,
            'Settings' => $this->settings,
            'SettingsOverrides' => $this->settingsOverrides,
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
        
        return new static(appPK: $json['AppPK'] ?? null,
            backstage: $json['Backstage'] ?? null,
            cID: $json['CID'] ?? null,
            channelCID: $json['ChannelCID'] ?? null,
            createdAt: $json['CreatedAt'] ?? null,
            createdByUserID: $json['CreatedByUserID'] ?? null,
            currentSessionID: $json['CurrentSessionID'] ?? null,
            iD: $json['ID'] ?? null,
            lastSessionID: $json['LastSessionID'] ?? null,
            team: $json['Team'] ?? null,
            thumbnailURL: $json['ThumbnailURL'] ?? null,
            type: $json['Type'] ?? null,
            updatedAt: $json['UpdatedAt'] ?? null,
            blockedUserIDs: $json['BlockedUserIDs'] ?? null,
            blockedUsers: $json['BlockedUsers'] ?? null,
            egresses: $json['Egresses'] ?? null,
            members: $json['Members'] ?? null,
            custom: $json['Custom'] ?? null,
            deletedAt: $json['DeletedAt'] ?? null,
            egressUpdatedAt: $json['EgressUpdatedAt'] ?? null,
            endedAt: $json['EndedAt'] ?? null,
            joinAheadTimeSeconds: $json['JoinAheadTimeSeconds'] ?? null,
            lastHeartbeatAt: $json['LastHeartbeatAt'] ?? null,
            memberCount: $json['MemberCount'] ?? null,
            startsAt: $json['StartsAt'] ?? null,
            callType: $json['CallType'] ?? null,
            createdBy: $json['CreatedBy'] ?? null,
            memberLookup: $json['MemberLookup'] ?? null,
            session: $json['Session'] ?? null,
            settings: $json['Settings'] ?? null,
            settingsOverrides: $json['SettingsOverrides'] ?? null
        );
    }
} 
