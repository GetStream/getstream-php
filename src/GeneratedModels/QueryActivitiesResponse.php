<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ActivityResponse> $activities
 * @property string|null $next
 * @property string|null $prev
 */
class QueryActivitiesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ActivityResponse>|null List of activities matching the query */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null, // List of activities matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
