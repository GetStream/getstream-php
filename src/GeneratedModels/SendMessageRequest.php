<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SendMessageRequest extends BaseModel
{
    public function __construct(
        public ?MessageRequest $message = null, // Message data for creating or updating a message
        public ?bool $skipPush = null,
        public ?bool $skipEnrichUrl = null,
        public ?array $pendingMessageMetadata = null,
        public ?bool $pending = null,
        public ?bool $forceModeration = null,
        public ?bool $keepChannelHidden = null,
        public ?bool $includeMentionedMembers = null, // When true, the response includes mentioned_members: for each mentioned user, whether that user is currently a channel member. Requires the ReadChannelMembers permission
        public ?bool $includeChannelContext = null, // When true, the response includes channel_context: a slim channel object with cid, type, id and created_by
        public ?\DateTime $scheduledAt = null, // When set to a future time, the message is not sent now: it is stored and sent at that time (UTC), rounded up to the first whole minute that is at least 1 minute from now, never earlier than requested. The response then carries scheduled_message with the rounded time. Must be at most the app's maximum lead time (120 days by default) from now. A time that is now or in the past sends the message now as if scheduled_at was not set, unless the request's message ID belongs to a scheduled message that was canceled or already sent. Slash commands cannot be scheduled
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
