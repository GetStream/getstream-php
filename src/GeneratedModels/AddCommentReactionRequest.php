<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddCommentReactionRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null,    // The type of reaction, eg upvote, like, ... 
        public ?bool $createNotificationActivity = null,    // Whether to create a notification activity for this reaction 
        public ?bool $enforceUnique = null,    // Whether to enforce unique reactions per user (remove other reaction types from the user when adding this one) 
        public ?bool $skipPush = null,
        public ?string $userID = null,
        public ?object $custom = null,    // Optional custom data to add to the reaction 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
