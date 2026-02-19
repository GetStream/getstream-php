<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelStateResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMemberResponse $membership = null,
        public ?ChannelPushPreferencesResponse $pushPreferences = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $pinnedMessages = null,
        public ?int $watcherCount = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $watchers = null,
        /** @var array<ReadStateResponse>|null */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null,
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null,
        /** @var array<ThreadStateResponse>|null */
        #[ArrayOf(ThreadStateResponse::class)]
        public ?array $threads = null,
        public ?bool $hidden = null,
        public ?\DateTime $hideMessagesBefore = null,
        /** @var array<PendingMessageResponse>|null */
        #[ArrayOf(PendingMessageResponse::class)]
        public ?array $pendingMessages = null,
        /** @var array<SharedLocationResponseData>|null */
        #[ArrayOf(SharedLocationResponseData::class)]
        public ?array $activeLiveLocations = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
