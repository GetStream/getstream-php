<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetScheduledActivityResponse extends BaseModel
{
    public function __construct(
        public ?ScheduledActivityResponse $scheduledActivity = null, // An activity scheduled to be published at a future time
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
