<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An activity scheduled to be published at a future time
 */
class ScheduledActivityResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // ID of the scheduled activity, also the ID the activity gets when published
        public ?string $userID = null, // ID of the user the activity is published as
        public ?array $feeds = null, // Feeds the activity will be added to
        public ?ScheduledActivityPreview $activity = null, // The activity a scheduled activity will publish
        public ?\DateTime $scheduledAt = null, // When the activity will be published
        public ?string $status = null, // One of: scheduled, publishing, failed, canceled
        public ?string $failureReason = null, // Why the publish failed; set only when status is failed
        public ?\DateTime $createdAt = null, // When the activity was scheduled
        public ?\DateTime $updatedAt = null, // When the scheduled activity was last changed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
