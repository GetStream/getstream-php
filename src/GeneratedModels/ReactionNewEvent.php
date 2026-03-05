<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a new reaction is added to a message.
 */
class ReactionNewEvent extends BaseModel
{
    public function __construct(
        public ?ReactionResponse $reaction = null,
        public ?string $messageID = null,
        public ?MessageResponse $message = null,
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $threadParticipants = null, // The participants of the thread
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "reaction.new" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel containing the message
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel containing the message
        public ?string $channelID = null, // The ID of the channel containing the message
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
