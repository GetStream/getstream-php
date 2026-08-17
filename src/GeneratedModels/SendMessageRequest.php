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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
