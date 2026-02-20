<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelStateResponseFields extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of channel messages
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $pinnedMessages = null, // List of pinned messages in the channel
        public ?int $watcherCount = null, // Number of channel watchers
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $watchers = null, // List of user who is watching the channel
        /** @var array<ReadStateResponse>|null */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null, // List of read states
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of channel members
        public ?ChannelMemberResponse $membership = null,
        public ?ChannelPushPreferencesResponse $pushPreferences = null,
        /** @var array<ThreadStateResponse>|null */
        #[ArrayOf(ThreadStateResponse::class)]
        public ?array $threads = null,
        public ?bool $hidden = null, // Whether this channel is hidden or not
        public ?\DateTime $hideMessagesBefore = null, // Messages before this date are hidden from the user
        /** @var array<PendingMessageResponse>|null */
        #[ArrayOf(PendingMessageResponse::class)]
        public ?array $pendingMessages = null, // Pending messages that this user has sent
        public ?DraftResponse $draft = null,
        /** @var array<SharedLocationResponseData>|null */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null, // Active live locations in the channel
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
