<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NotificationTrigger extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of notification (mention, reaction, comment, follow, etc.)
        public ?string $text = null, // Human-readable text describing the notification
        public ?NotificationComment $comment = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
