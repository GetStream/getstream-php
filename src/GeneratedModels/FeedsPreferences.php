<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsPreferences extends BaseModel
{
    public function __construct(
        public ?string $comment = null, // Push notification preference for comments on user's activities. One of: all, none
        public ?string $commentReaction = null, // Push notification preference for reactions on comments. One of: all, none
        public ?string $commentReply = null, // Push notification preference for replies to comments. One of: all, none
        public ?string $follow = null, // Push notification preference for new followers. One of: all, none
        public ?string $mention = null, // Push notification preference for mentions in activities or comments. One of: all, none
        public ?string $reaction = null, // Push notification preference for reactions on user's activities or comments. One of: all, none
        public ?array $customActivityTypes = null, // Push notification preferences for custom activity types. Map of activity type to preference (all or none)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
