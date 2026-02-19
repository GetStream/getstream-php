<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets unbanned. The event contains information about the user that was unbanned.
 */
class UserUnbannedEvent extends BaseModel
{
    public function __construct(
        public ?UserResponseCommonFields $createdBy = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "user.unbanned" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the target user was unbanned
        public ?string $team = null, // The team of the channel where the target user was unbanned
        public ?int $channelMemberCount = null,
        public ?int $channelMessageCount = null,
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel where the target user was unbanned
        public ?string $channelID = null, // The ID of the channel where the target user was unbanned
        public ?bool $shadow = null, // Whether the target user was shadow unbanned
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
