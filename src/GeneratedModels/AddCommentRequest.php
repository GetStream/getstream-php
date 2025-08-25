<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddCommentRequest extends BaseModel
{
    public function __construct(
        public ?string $comment = null,    // Text content of the comment 
        public ?string $objectID = null,    // ID of the object to comment on 
        public ?string $objectType = null,    // Type of the object to comment on 
        public ?bool $createNotificationActivity = null,    // Whether to create a notification activity for this comment 
        public ?string $parentID = null,    // ID of parent comment for replies 
        public ?bool $skipPush = null,
        public ?string $userID = null,
        public ?array $attachments = null,    // Media attachments for the reply 
        public ?array $mentionedUserIds = null,    // List of users mentioned in the reply 
        public ?object $custom = null,    // Custom data for the comment 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
