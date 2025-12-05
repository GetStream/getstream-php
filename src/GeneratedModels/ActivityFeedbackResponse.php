<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for activity feedback submission
 *
 * @property string $activityID
 * @property string $duration
 */
class ActivityFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $activityID = null, // The ID of the activity that received feedback
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
