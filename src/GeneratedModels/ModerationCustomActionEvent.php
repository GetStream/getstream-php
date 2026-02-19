<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a custom moderation action is executed
 */
class ModerationCustomActionEvent extends BaseModel
{
    public function __construct(
        public ?MessageResponse $message = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $actionID = null, // The ID of the custom action that was executed
        public ?object $actionOptions = null, // Additional options passed to the custom action
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
