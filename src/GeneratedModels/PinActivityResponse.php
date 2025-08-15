<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PinActivityResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // When the activity was pinned 
        public ?string $duration = null,
        public ?string $feed = null,    // Fully qualified ID of the feed the activity was pinned to 
        public ?string $userID = null,    // ID of the user who pinned the activity 
        public ?ActivityResponse $activity = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
