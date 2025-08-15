<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelMember extends BaseModel
{
    public function __construct(
        public ?bool $banned = null,    // Whether member is banned this channel or not 
        public ?string $channelRole = null,    // Role of the member in the channel 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?bool $notificationsMuted = null,
        public ?bool $shadowBanned = null,    // Whether member is shadow banned in this channel or not 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?object $custom = null,
        public ?\DateTime $archivedAt = null,
        public ?\DateTime $banExpires = null,    // Expiration date of the ban 
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $inviteAcceptedAt = null,    // Date when invite was accepted 
        public ?\DateTime $inviteRejectedAt = null,    // Date when invite was rejected 
        public ?bool $invited = null,    // Whether member was invited or not 
        public ?bool $isModerator = null,    // Whether member is channel moderator or not 
        public ?\DateTime $pinnedAt = null,
        public ?string $role = null,    // Permission level of the member in the channel (DEPRECATED: use channel_role instead) 
        public ?string $status = null,
        public ?string $userID = null,
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
