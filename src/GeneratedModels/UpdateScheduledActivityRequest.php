<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateScheduledActivityRequest extends BaseModel
{
    public function __construct(
        public ?ActivityRequest $activity = null,
        public ?\DateTime $scheduledAt = null, // When to publish the activity, an RFC 3339 time. A time less than a minute ahead or in the past is moved to one minute from now, and the time is rounded up to a whole minute.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
