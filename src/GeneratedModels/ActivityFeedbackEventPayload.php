<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $action
 * @property string $activityID
 * @property \DateTime $createdAt
 * @property \DateTime $updatedAt
 * @property string $value
 * @property UserResponse $user
 */
class ActivityFeedbackEventPayload extends BaseModel
{
    public function __construct(
        public ?string $action = null, // The type of feedback action
        public ?string $activityID = null, // The activity that received feedback
        public ?\DateTime $createdAt = null, // When the feedback was created
        public ?\DateTime $updatedAt = null, // When the feedback was last updated
        public ?string $value = null, // The feedback value (true/false)
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
