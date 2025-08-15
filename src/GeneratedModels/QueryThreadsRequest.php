<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryThreadsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $memberLimit = null,
        public ?string $next = null,
        public ?int $participantLimit = null,    // Limit the number of participants returned per each thread 
        public ?string $prev = null,
        public ?int $replyLimit = null,    // Limit the number of replies returned per each thread 
        public ?string $userID = null,
        public ?array $sort = null,    // Sort conditions to apply to threads 
        public ?object $filter = null,    // Filter conditions to apply to threads 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
