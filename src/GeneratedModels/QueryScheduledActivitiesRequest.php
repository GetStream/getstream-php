<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryScheduledActivitiesRequest extends BaseModel
{
    public function __construct(
        public ?QueryScheduledActivitiesFilter $filter = null,
        public ?int $limit = null, // Maximum number of scheduled activities to return. Default 25, maximum 100.
        public ?string $next = null, // Cursor from a previous response to fetch the next page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
