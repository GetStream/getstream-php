<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PollVoteResponse extends BaseModel
{
    public function __construct(
        public ?PollVoteResponseData $vote = null,
        public ?PollResponseData $poll = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
