<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetOrCreateFeedGroupRequest extends BaseModel
{
    public function __construct(
        public ?string $defaultVisibility = null,    // Default visibility for the feed group, can be 'public', 'visible', 'followers', 'members', or 'private'. Defaults to 'visible' if not provided.  
        public ?object $custom = null,    // Custom data for the feed group 
        public ?NotificationConfig $notification = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
