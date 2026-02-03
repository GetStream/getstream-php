<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property ActivityResponse $activity
 * @property int|null $mentionNotificationsCreated
 */
class AddActivityResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?ActivityResponse $activity = null,
        public ?int $mentionNotificationsCreated = null, // Number of mention notification activities created for mentioned users
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
