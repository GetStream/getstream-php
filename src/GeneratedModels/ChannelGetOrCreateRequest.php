<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelGetOrCreateRequest extends BaseModel
{
    public function __construct(
        public ?ChannelInput $data = null,
        public ?bool $state = null, // Refresh channel state
        public ?bool $hideForCreator = null, // Whether this channel will be hidden for the user who created the channel or not
        public ?bool $threadUnreadCounts = null,
        public ?MessagePaginationParams $messages = null,
        public ?PaginationParams $members = null,
        public ?PaginationParams $watchers = null,
        public ?array $memberCustomInclude = null, // Top-level keys of the message sender's channel-member custom data to include under member.custom (max 8 keys, 64 chars each)
        public ?bool $includeScheduledMessages = null, // Adds scheduled_messages to the response: the acting user's own scheduled, sending and failed messages in this channel (server-side requests name the user with data.created_by_id or data.created_by; without one the field is omitted). Absent from the response when there are more than 100 or they could not be loaded; use the scheduled messages query then
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
