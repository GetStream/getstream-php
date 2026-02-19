<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelMemberResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $userID = null,
        public ?bool $isModerator = null, // Whether member is channel moderator or not
        public ?object $custom = null,
        public ?bool $invited = null, // Whether member was invited or not
        public ?\DateTime $inviteAcceptedAt = null, // Date when invite was accepted
        public ?\DateTime $inviteRejectedAt = null, // Date when invite was rejected
        public ?string $status = null,
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?\DateTime $deletedAt = null,
        public ?bool $banned = null, // Whether member is banned this channel or not
        public ?\DateTime $banExpires = null, // Expiration date of the ban
        public ?bool $shadowBanned = null, // Whether member is shadow banned in this channel or not
        public ?\DateTime $pinnedAt = null,
        public ?\DateTime $archivedAt = null,
        public ?string $role = null, // Permission level of the member in the channel (DEPRECATED: use channel_role instead). One of: member, moderator, admin, owner
        public ?string $channelRole = null, // Role of the member in the channel
        public ?bool $notificationsMuted = null,
        public ?array $deletedMessages = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
