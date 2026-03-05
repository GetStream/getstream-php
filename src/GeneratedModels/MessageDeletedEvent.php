<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a message is deleted.
 */
class MessageDeletedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "message.deleted" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the message was sent
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel where the message was sent
        public ?string $channelID = null, // The ID of the channel where the message was sent
        public ?string $messageID = null,
        public ?MessageResponse $message = null,
        public ?UserResponseCommonFields $user = null,
        public ?bool $hardDelete = null, // Whether the message was hard deleted
        public ?bool $deletedForMe = null, // Whether the message was deleted only for the current user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
