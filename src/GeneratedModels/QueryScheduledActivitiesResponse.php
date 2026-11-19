<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryScheduledActivitiesResponse extends BaseModel
{
    public function __construct(
        /** @var array<ScheduledActivityResponse>|null */
        #[ArrayOf(ScheduledActivityResponse::class)]
        public ?array $scheduledActivities = null, // The scheduled activities, ordered by scheduled_at
        public ?string $next = null, // Cursor for the next page, absent on the last page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
