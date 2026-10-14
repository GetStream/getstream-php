<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateScheduledMessageRequest extends BaseModel
{
    public function __construct(
        public ?MessageRequest $message = null, // Message data for creating or updating a message
        public ?\DateTime $scheduledAt = null, // New send time (UTC). Must be at least 1 minute and at most the app's maximum lead time from now
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
