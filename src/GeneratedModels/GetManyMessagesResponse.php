<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class GetManyMessagesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of messages
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
