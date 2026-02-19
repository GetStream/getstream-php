<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a message is undeleted.
 */
class MessageUndeletedEvent extends BaseModel
{
    public function __construct(
        public ?MessageResponse $message = null,
        public ?string $type = null, // The type of event: "message.undeleted" in this case
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
