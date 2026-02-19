<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryThreadsRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?int $replyLimit = null, // Limit the number of replies returned per each thread
        public ?int $participantLimit = null, // Limit the number of participants returned per each thread
        public ?int $memberLimit = null,
        public ?object $filter = null, // Filter conditions to apply to threads
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort conditions to apply to threads
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
