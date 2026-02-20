<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PendingMessageResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?array $metadata = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
