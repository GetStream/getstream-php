<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelMemberResponse implements JsonSerializable
{
    public function __construct(public ?bool $banned = null,
        public ?string $channelRole = null,
        public ?\DateTime $createdAt = null,
        public ?bool $notificationsMuted = null,
        public ?bool $shadowBanned = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
        public ?\DateTime $archivedAt = null,
        public ?\DateTime $banExpires = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $inviteAcceptedAt = null,
        public ?\DateTime $inviteRejectedAt = null,
        public ?bool $invited = null,
        public ?bool $isModerator = null,
        public ?\DateTime $pinnedAt = null,
        public ?string $role = null,
        public ?string $status = null,
        public ?string $userID = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'banned' => $this->banned,
            'channel_role' => $this->channelRole,
            'created_at' => $this->createdAt,
            'notifications_muted' => $this->notificationsMuted,
            'shadow_banned' => $this->shadowBanned,
            'updated_at' => $this->updatedAt,
            'custom' => $this->custom,
            'archived_at' => $this->archivedAt,
            'ban_expires' => $this->banExpires,
            'deleted_at' => $this->deletedAt,
            'invite_accepted_at' => $this->inviteAcceptedAt,
            'invite_rejected_at' => $this->inviteRejectedAt,
            'invited' => $this->invited,
            'is_moderator' => $this->isModerator,
            'pinned_at' => $this->pinnedAt,
            'role' => $this->role,
            'status' => $this->status,
            'user_id' => $this->userID,
            'user' => $this->user,
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
        
        return new static(banned: $json['banned'] ?? null,
            channelRole: $json['channel_role'] ?? null,
            createdAt: $json['created_at'] ?? null,
            notificationsMuted: $json['notifications_muted'] ?? null,
            shadowBanned: $json['shadow_banned'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            custom: $json['custom'] ?? null,
            archivedAt: $json['archived_at'] ?? null,
            banExpires: $json['ban_expires'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            inviteAcceptedAt: $json['invite_accepted_at'] ?? null,
            inviteRejectedAt: $json['invite_rejected_at'] ?? null,
            invited: $json['invited'] ?? null,
            isModerator: $json['is_moderator'] ?? null,
            pinnedAt: $json['pinned_at'] ?? null,
            role: $json['role'] ?? null,
            status: $json['status'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
