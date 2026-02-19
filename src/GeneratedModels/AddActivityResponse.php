<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddActivityResponse extends BaseModel
{
    public function __construct(
        public ?ActivityResponse $activity = null,
        public ?int $mentionNotificationsCreated = null, // Number of mention notification activities created for mentioned users
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
