<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteUsersRequest implements JsonSerializable
{
    public function __construct(public ?bool $audio = null,
        public ?bool $muteAllUsers = null,
        public ?string $mutedByID = null,
        public ?bool $screenshare = null,
        public ?bool $screenshareAudio = null,
        public ?bool $video = null,
        public ?array $userIds = null,
        public ?UserRequest $mutedBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio' => $this->audio,
            'mute_all_users' => $this->muteAllUsers,
            'muted_by_id' => $this->mutedByID,
            'screenshare' => $this->screenshare,
            'screenshare_audio' => $this->screenshareAudio,
            'video' => $this->video,
            'user_ids' => $this->userIds,
            'muted_by' => $this->mutedBy,
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
        
        return new static(audio: $json['audio'] ?? null,
            muteAllUsers: $json['mute_all_users'] ?? null,
            mutedByID: $json['muted_by_id'] ?? null,
            screenshare: $json['screenshare'] ?? null,
            screenshareAudio: $json['screenshare_audio'] ?? null,
            video: $json['video'] ?? null,
            userIds: $json['user_ids'] ?? null,
            mutedBy: $json['muted_by'] ?? null
        );
    }
} 
