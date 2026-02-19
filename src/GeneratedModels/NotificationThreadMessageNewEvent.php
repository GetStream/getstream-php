<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a new message was sent to a thread.
 */
class NotificationThreadMessageNewEvent extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?string $type = null, // The type of event: "notification.message_new" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel where the message was sent
        public ?int $channelMemberCount = null,
        public ?int $channelMessageCount = null,
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel where the message was sent
        public ?string $channelID = null, // The ID of the channel where the message was sent
        public ?string $threadID = null, // The ID of the thread
        public ?string $messageID = null,
        public ?int $watcherCount = null, // The number of watchers
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $threadParticipants = null, // The participants of the thread
        public ?string $team = null, // The team ID
        public ?string $parentAuthor = null,
        public ?int $unreadThreads = null,
        public ?int $unreadThreadMessages = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
