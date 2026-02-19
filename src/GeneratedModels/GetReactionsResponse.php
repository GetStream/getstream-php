<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetReactionsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ReactionResponse>|null */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $reactions = null, // List of reactions
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
