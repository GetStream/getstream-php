<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedsPreferences extends BaseModel
{
    public function __construct(
        public ?string $comment = null,    // Push notification preference for comments on user's activities 
        public ?string $commentReaction = null,    // Push notification preference for reactions on comments 
        public ?string $commentReply = null,    // Push notification preference for replies to comments 
        public ?string $follow = null,    // Push notification preference for new followers 
        public ?string $mention = null,    // Push notification preference for mentions in activities or comments 
        public ?string $reaction = null,    // Push notification preference for reactions on user's activities or comments 
        public ?array $customActivityTypes = null,    // Push notification preferences for custom activity types. Map of activity type to preference (all or none) 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
