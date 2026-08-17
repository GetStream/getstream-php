<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PendingMessageResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null, // User response object
        public ?ChannelResponse $channel = null, // Represents channel in chat
        public ?MessageResponse $message = null, // Represents any chat message
        public ?array $metadata = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
