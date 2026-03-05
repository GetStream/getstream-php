<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a message gets flagged. The event contains information about the message that was flagged.
 */
class MessageFlaggedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "message.flagged" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
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
        public ?FlagResponse $flag = null,
        public ?string $reason = null, // The reason for the flag
        public ?int $totalFlags = null, // The total number of flags for the user
        public ?MessageModerationResult $details = null,
        public ?object $custom = null, // Custom data
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
