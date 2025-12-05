<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property NotificationTarget|null $target
 * @property NotificationTrigger|null $trigger
 */
class NotificationContext extends BaseModel
{
    public function __construct(
        public ?NotificationTarget $target = null,
        public ?NotificationTrigger $trigger = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
