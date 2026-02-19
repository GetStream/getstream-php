<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Options to control fetching reactions from friends (users you follow or have mutual follows with).
 */
class FriendReactionsOptions extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Default: false. When true, fetches friend reactions for activities.
        public ?string $type = null, // Default: 'following'. The type of friend relationship to use. 'following' = users you follow, 'mutual' = users with mutual follows. One of: following, mutual
        public ?int $limit = null, // Default: 3, Max: 10. The maximum number of friend reactions to return per activity.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
