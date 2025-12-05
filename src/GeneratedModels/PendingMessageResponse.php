<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property ChannelResponse|null $channel
 * @property MessageResponse|null $message
 * @property array|null $metadata
 * @property UserResponse|null $user
 */
class PendingMessageResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        public ?array $metadata = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
