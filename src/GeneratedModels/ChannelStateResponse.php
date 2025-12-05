<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
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
class ChannelStateResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $pinnedMessages = null,
        /** @var array<ThreadStateResponse>|null */
        #[ArrayOf(ThreadStateResponse::class)]
        public ?array $threads = null,
        public ?bool $hidden = null,
        public ?\DateTime $hideMessagesBefore = null,
        public ?int $watcherCount = null,
        /** @var array<SharedLocationResponseData>|null */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null,
        /** @var array<PendingMessageResponse>|null */
        #[ArrayOf(PendingMessageResponse::class)]
        public ?array $pendingMessages = null,
        /** @var array<ReadStateResponse>|null */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $watchers = null,
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMemberResponse $membership = null,
        public ?ChannelPushPreferencesResponse $pushPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
