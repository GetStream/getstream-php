<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<PollResponseData> $polls
 * @property string|null $next
 * @property string|null $prev
 */
class QueryPollsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<PollResponseData>|null Polls data returned by the query */
        #[ArrayOf(PollResponseData::class)]
        public ?array $polls = null, // Polls data returned by the query
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
