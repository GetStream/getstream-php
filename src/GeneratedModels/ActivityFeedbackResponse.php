<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for activity feedback submission
 */
class ActivityFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $activityID = null,    // The ID of the activity that received feedback 
        public ?string $duration = null,
        public ?bool $success = null,    // Whether the feedback was successfully processed 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
