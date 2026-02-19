<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryPinnedActivitiesResponse extends BaseModel
{
    public function __construct(
        /** @var array<ActivityPinResponse>|null */
        #[ArrayOf(ActivityPinResponse::class)]
        public ?array $pinnedActivities = null, // List of pinned activities matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
