<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsNotificationTrigger extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $text = null,
        public ?FeedsNotificationComment $comment = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
