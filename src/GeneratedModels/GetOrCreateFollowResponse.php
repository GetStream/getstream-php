<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFollowResponse extends BaseModel
{
    public function __construct(
        public ?FollowResponse $follow = null,
        public ?bool $created = null, // True if the follow was newly created by this request; false if it already existed
        public ?bool $notificationCreated = null, // Whether a notification activity was successfully created (only set when the follow was newly created)
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
