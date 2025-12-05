<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<MessageResponse>|null $messages
 * @property array<ReactionResponse>|null $reactions
 * @property UserResponse|null $user
 */
class ExportUserResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<MessageResponse>|null List of exported messages */
        #[ArrayOf(MessageResponse::class)]
        public ?array $messages = null, // List of exported messages
        /** @var array<ReactionResponse>|null List of exported reactions */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $reactions = null, // List of exported reactions
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
