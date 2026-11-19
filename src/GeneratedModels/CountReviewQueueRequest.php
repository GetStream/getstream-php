<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CountReviewQueueRequest extends BaseModel
{
    public function __construct(
        public ?object $filter = null, // Filter conditions for review queue items, the same filter Query Review Queue takes. The count covers exactly the items that query lists for this filter, ignoring sort, paging and item locks.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
