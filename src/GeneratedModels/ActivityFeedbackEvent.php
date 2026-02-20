<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when activity feedback is provided.
 */
class ActivityFeedbackEvent extends BaseModel
{
    public function __construct(
        public ?ActivityFeedbackEventPayload $activityFeedback = null,
        public ?string $type = null, // The type of event: "feeds.activity.feedback" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
