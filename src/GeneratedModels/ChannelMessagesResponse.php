<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing channel and its messages
 */
class ChannelMessagesResponse extends BaseModel
{
    public function __construct(
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of messages
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
