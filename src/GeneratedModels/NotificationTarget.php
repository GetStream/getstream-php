<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class NotificationTarget extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // The ID of the target (activity ID or user ID) 
        public ?string $name = null,    // The name of the target user (for user targets like follows) 
        public ?string $text = null,    // The text content of the target activity (for activity targets) 
        public ?string $type = null,    // The type of the target activity (for activity targets) 
        public ?string $userID = null,    // The ID of the user who created the target activity (for activity targets) 
        public ?array $attachments = null,    // Attachments on the target activity (for activity targets) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
