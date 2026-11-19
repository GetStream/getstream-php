<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a scheduled activity fails to publish.
 */
class ScheduledActivityFailedEvent extends BaseModel
{
    public function __construct(
        public ?ScheduledActivityResponse $scheduledActivity = null, // An activity scheduled to be published at a future time
        public ?string $type = null, // The type of event: "feeds.scheduled_activity.failed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $failureReason = null, // Why the activity failed to publish
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
