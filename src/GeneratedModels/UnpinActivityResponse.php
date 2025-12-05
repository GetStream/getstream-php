<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string $feed
 * @property string $userID
 * @property ActivityResponse $activity
 */
class UnpinActivityResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $feed = null, // Fully qualified ID of the feed the activity was unpinned from
        public ?string $userID = null, // ID of the user who unpinned the activity
        public ?ActivityResponse $activity = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
