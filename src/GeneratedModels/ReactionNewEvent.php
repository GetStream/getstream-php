<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a new reaction is added to a message.
 */
class ReactionNewEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?string $type = null, // The type of event: "reaction.new" in this case
        public ?string $channelID = null, // The ID of the channel containing the message
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?string $channelType = null, // The type of the channel containing the message
        public ?string $cid = null, // The CID of the channel containing the message
        public ?string $messageID = null,
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $threadParticipants = null, // The participants of the thread
        public ?object $channelCustom = null,
        public ?MessageResponse $message = null,
        public ?ReactionResponse $reaction = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
