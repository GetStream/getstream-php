<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a custom moderation action is executed
 */
class ModerationCustomActionEvent extends BaseModel
{
    public function __construct(
        public ?string $actionID = null,    // The ID of the custom action that was executed 
        public ?\DateTime $createdAt = null,
        public ?object $custom = null,
        public ?ReviewQueueItemResponse $reviewQueueItem = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
        public ?object $actionOptions = null,    // Additional options passed to the custom action 
        public ?MessageResponse $message = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
