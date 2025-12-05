<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ReactionResponse> $reactions
 */
class GetReactionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ReactionResponse>|null List of reactions */
        #[ArrayOf(ReactionResponse::class)]
        public ?array $reactions = null, // List of reactions
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
