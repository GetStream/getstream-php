<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FollowRequest extends BaseModel
{
    public function __construct(
        public ?string $source = null,    // Fully qualified ID of the source feed 
        public ?string $target = null,    // Fully qualified ID of the target feed 
        public ?bool $createNotificationActivity = null,    // Whether to create a notification activity for this follow 
        public ?string $pushPreference = null,    // Push preference for the follow relationship 
        public ?object $custom = null,    // Custom data for the follow relationship 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
