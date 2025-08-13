<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents a call
 */
class CallResponse implements JsonSerializable
{
    public function __construct(public ?bool $backstage = null,
        public ?bool $captioning = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $currentSessionID = null,
        public ?string $id = null,
        public ?bool $recording = null,
        public ?bool $transcribing = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?array $blockedUserIds = null,
        public ?UserResponse $createdBy = null,
        public ?object $custom = null,
        public ?EgressResponse $egress = null,
        public ?CallIngressResponse $ingress = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $channelCid = null,
        public ?\DateTime $endedAt = null,
        public ?int $joinAheadTimeSeconds = null,
        public ?\DateTime $startsAt = null,
        public ?string $team = null,
        public ?CallSessionResponse $session = null,
        public ?ThumbnailResponse $thumbnails = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'backstage' => $this->backstage,
            'captioning' => $this->captioning,
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'current_session_id' => $this->currentSessionID,
            'id' => $this->id,
            'recording' => $this->recording,
            'transcribing' => $this->transcribing,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'blocked_user_ids' => $this->blockedUserIds,
            'created_by' => $this->createdBy,
            'custom' => $this->custom,
            'egress' => $this->egress,
            'ingress' => $this->ingress,
            'settings' => $this->settings,
            'channel_cid' => $this->channelCid,
            'ended_at' => $this->endedAt,
            'join_ahead_time_seconds' => $this->joinAheadTimeSeconds,
            'starts_at' => $this->startsAt,
            'team' => $this->team,
            'session' => $this->session,
            'thumbnails' => $this->thumbnails,
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
        
        return new static(backstage: $json['backstage'] ?? null,
            captioning: $json['captioning'] ?? null,
            cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            currentSessionID: $json['current_session_id'] ?? null,
            id: $json['id'] ?? null,
            recording: $json['recording'] ?? null,
            transcribing: $json['transcribing'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            blockedUserIds: $json['blocked_user_ids'] ?? null,
            createdBy: $json['created_by'] ?? null,
            custom: $json['custom'] ?? null,
            egress: $json['egress'] ?? null,
            ingress: $json['ingress'] ?? null,
            settings: $json['settings'] ?? null,
            channelCid: $json['channel_cid'] ?? null,
            endedAt: $json['ended_at'] ?? null,
            joinAheadTimeSeconds: $json['join_ahead_time_seconds'] ?? null,
            startsAt: $json['starts_at'] ?? null,
            team: $json['team'] ?? null,
            session: $json['session'] ?? null,
            thumbnails: $json['thumbnails'] ?? null
        );
    }
} 
