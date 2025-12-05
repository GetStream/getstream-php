<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<ChannelMemberResponse> $members
 * @property array<MessageResponse> $messages
 * @property array<MessageResponse> $pinnedMessages
 * @property array<ThreadStateResponse> $threads
 * @property bool|null $hidden
 * @property \DateTime|null $hideMessagesBefore
 * @property int|null $watcherCount
 * @property array<SharedLocationResponseData>|null $activeLiveLocations
 * @property array<PendingMessageResponse>|null $pendingMessages
 * @property array<ReadStateResponse>|null $read
 * @property array<UserResponse>|null $watchers
 * @property ChannelResponse|null $channel
 * @property DraftResponse|null $draft
 * @property ChannelMemberResponse|null $membership
 * @property ChannelPushPreferencesResponse|null $pushPreferences
 */
class ChannelStateResponseFields extends BaseModel
{
    public function __construct(
        /** @var array<ChannelMemberResponse>|null List of channel members */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of channel members
        /** @var array<MessageResponse>|null List of channel messages */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of channel messages
        /** @var array<MessageResponse>|null List of pinned messages in the channel */
        #[ArrayOf(MessageResponse::class)]
        public ?array $pinnedMessages = null, // List of pinned messages in the channel
        /** @var array<ThreadStateResponse>|null */
        #[ArrayOf(ThreadStateResponse::class)]
        public ?array $threads = null,
        public ?bool $hidden = null, // Whether this channel is hidden or not
        public ?\DateTime $hideMessagesBefore = null, // Messages before this date are hidden from the user
        public ?int $watcherCount = null, // Number of channel watchers
        /** @var array<SharedLocationResponseData>|null Active live locations in the channel */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null, // Active live locations in the channel
        /** @var array<PendingMessageResponse>|null Pending messages that this user has sent */
        #[ArrayOf(PendingMessageResponse::class)]
        public ?array $pendingMessages = null, // Pending messages that this user has sent
        /** @var array<ReadStateResponse>|null List of read states */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null, // List of read states
        /** @var array<UserResponse>|null List of user who is watching the channel */
        #[ArrayOf(UserResponse::class)]
        public ?array $watchers = null, // List of user who is watching the channel
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMemberResponse $membership = null,
        public ?ChannelPushPreferencesResponse $pushPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
