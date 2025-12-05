<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $limit
 * @property int|null $memberLimit
 * @property string|null $next
 * @property int|null $participantLimit
 * @property string|null $prev
 * @property int|null $replyLimit
 * @property string|null $userID
 * @property array<SortParamRequest>|null $sort
 * @property object|null $filter
 * @property UserRequest|null $user
 */
class QueryThreadsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $memberLimit = null,
        public ?string $next = null,
        public ?int $participantLimit = null, // Limit the number of participants returned per each thread
        public ?string $prev = null,
        public ?int $replyLimit = null, // Limit the number of replies returned per each thread
        public ?string $userID = null,
        /** @var array<SortParamRequest>|null Sort conditions to apply to threads */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort conditions to apply to threads
        public ?object $filter = null, // Filter conditions to apply to threads
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
