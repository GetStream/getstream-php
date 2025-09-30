<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationTrigger extends BaseModel
{
    public function __construct(
        public ?string $text = null,    // Human-readable text describing the notification 
        public ?string $type = null,    // The type of notification (mention, reaction, comment, follow, etc.) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
