<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetPinnedMessagesResponse extends BaseModel
{
    public function __construct(
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // Messages
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
