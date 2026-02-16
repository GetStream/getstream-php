<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a new message was sent to a thread.
 */
class NotificationThreadMessageNewEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $messageID = null,
        public ?string $threadID = null, // The ID of the thread
        public ?int $watcherCount = null, // The number of watchers
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?MessageResponse $message = null,
        public ?string $type = null, // The type of event: "notification.message_new" in this case
        public ?string $channelID = null, // The ID of the channel where the message was sent
        public ?int $channelMemberCount = null,
        public ?int $channelMessageCount = null,
        public ?string $channelType = null, // The type of the channel where the message was sent
        public ?string $cid = null, // The CID of the channel where the message was sent
        public ?string $parentAuthor = null,
        public ?\DateTime $receivedAt = null,
        public ?string $team = null, // The team ID
        public ?int $unreadThreadMessages = null,
        public ?int $unreadThreads = null,
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $threadParticipants = null, // The participants of the thread
        public ?object $channelCustom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
