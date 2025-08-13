<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallRequest is the payload for creating a call.
 */
class CallRequest implements JsonSerializable
{
    public function __construct(public ?string $channelCid = null,
        public ?string $createdByID = null,
        public ?\DateTime $startsAt = null,
        public ?string $team = null,
        public ?bool $video = null,
        public ?array $members = null,
        public ?UserRequest $createdBy = null,
        public ?object $custom = null,
        public ?CallSettingsRequest $settingsOverride = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_cid' => $this->channelCid,
            'created_by_id' => $this->createdByID,
            'starts_at' => $this->startsAt,
            'team' => $this->team,
            'video' => $this->video,
            'members' => $this->members,
            'created_by' => $this->createdBy,
            'custom' => $this->custom,
            'settings_override' => $this->settingsOverride,
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
        
        return new static(channelCid: $json['channel_cid'] ?? null,
            createdByID: $json['created_by_id'] ?? null,
            startsAt: $json['starts_at'] ?? null,
            team: $json['team'] ?? null,
            video: $json['video'] ?? null,
            members: $json['members'] ?? null,
            createdBy: $json['created_by'] ?? null,
            custom: $json['custom'] ?? null,
            settingsOverride: $json['settings_override'] ?? null
        );
    }
} 
