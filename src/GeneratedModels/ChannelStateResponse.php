<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelStateResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $members = null,
        public ?array $messages = null,
        public ?array $pinnedMessages = null,
        public ?array $threads = null,
        public ?bool $hidden = null,
        public ?\DateTime $hideMessagesBefore = null,
        public ?int $watcherCount = null,
        public ?array $activeLiveLocations = null,
        public ?array $pendingMessages = null,
        public ?array $read = null,
        public ?array $watchers = null,
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMemberResponse $membership = null,
        public ?ChannelPushPreferencesResponse $pushPreferences = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
