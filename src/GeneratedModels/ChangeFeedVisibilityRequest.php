<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChangeFeedVisibilityRequest extends BaseModel
{
    public function __construct(
        public ?string $visibility = null, // Feed visibility level: public, visible, followers, members, or private
        public ?string $pendingFollowsAction = null, // What to do with existing pending follows when loosening visibility from 'followers': auto_approve (default) or reject
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
