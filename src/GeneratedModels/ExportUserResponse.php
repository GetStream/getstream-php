<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ExportUserResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of exported messages
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $reactions = null, // List of exported reactions
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
