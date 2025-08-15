<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelStateResponseFields extends BaseModel
{
    public function __construct(
        public ?array $members = null,    // List of channel members 
        public ?array $messages = null,    // List of channel messages 
        public ?array $pinnedMessages = null,    // List of pinned messages in the channel 
        public ?array $threads = null,
        public ?bool $hidden = null,    // Whether this channel is hidden or not 
        public ?\DateTime $hideMessagesBefore = null,    // Messages before this date are hidden from the user 
        public ?int $watcherCount = null,    // Number of channel watchers 
        public ?array $activeLiveLocations = null,    // Active live locations in the channel 
        public ?array $pendingMessages = null,    // Pending messages that this user has sent 
        public ?array $read = null,    // List of read states 
        public ?array $watchers = null,    // List of user who is watching the channel 
        public ?ChannelResponse $channel = null,
        public ?DraftResponse $draft = null,
        public ?ChannelMember $membership = null,
        public ?ChannelPushPreferences $pushPreferences = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
