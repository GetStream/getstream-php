<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SendMessageResponse extends BaseModel
{
    public function __construct(
        public ?MessageResponse $message = null, // Represents any chat message
        public ?array $pendingMessageMetadata = null, // Pending message metadata
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?array $mentionedMembers = null, // Map of mentioned user ID to whether that user is currently an active channel member. Only set when include_mentioned_members was requested; omitted when the message has no mentions or the membership lookup failed
        public ?ChannelContextResponse $channelContext = null, // Slim channel object: identity plus creator
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
