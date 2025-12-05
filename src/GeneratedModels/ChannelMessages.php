<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<Message> $messages
 * @property ChannelResponse|null $channel
 */
class ChannelMessages extends BaseModel
{
    public function __construct(
        /** @var array<Message>|null */
        #[ArrayOf(Message::class)]
        public ?array $messages = null,
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
