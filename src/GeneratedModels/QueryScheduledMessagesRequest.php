<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryScheduledMessagesRequest extends BaseModel
{
    public function __construct(
        public ?ScheduledMessagesFilter $filter = null, // Filter for querying scheduled messages
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Only scheduled_at ascending is supported. Pending messages come before failed ones
        public ?int $limit = null, // Page size, 1 to 100. Defaults to 20
        public ?string $next = null, // Cursor from the previous page
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
