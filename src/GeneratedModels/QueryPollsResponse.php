<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryPollsResponse extends BaseModel
{
    public function __construct(
        /** @var array<PollResponseData>|null */
        #[ArrayOf(PollResponseData::class)]
        public ?array $polls = null, // Polls data returned by the query
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
