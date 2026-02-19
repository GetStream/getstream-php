<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryThreadsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ThreadStateResponse>|null */
        #[ArrayOf(ThreadStateResponse::class)]
        public ?array $threads = null, // List of enriched thread states
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
