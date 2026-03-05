<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class QueryCommentReactionsResponse extends BaseModel
{
    public function __construct(
        /** @var array<FeedsReactionResponse>|null */
        #[ArrayOf(FeedsReactionResponse::class)]
        public ?array $reactions = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
