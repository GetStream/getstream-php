<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets banned. The event contains information about the user that was banned.
 */
class UserBannedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "user.banned" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the target user was banned
        public ?string $team = null, // The team of the channel where the target user was banned
        public ?int $channelMemberCount = null,
        public ?int $channelMessageCount = null,
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel where the target user was banned
        public ?string $channelID = null, // The ID of the channel where the target user was banned
        public ?UserResponseCommonFields $user = null,
        public ?string $reason = null, // The reason for the ban
        public ?UserResponseCommonFields $createdBy = null,
        public ?\DateTime $expiration = null, // The expiration date of the ban
        public ?bool $shadow = null, // Whether the user was shadow banned
        public ?int $totalBans = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
