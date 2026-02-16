<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class PollVotesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<PollVoteResponseData>|null */
        #[ArrayOf(PollVoteResponseData::class)]
        public ?array $votes = null, // Poll votes
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
