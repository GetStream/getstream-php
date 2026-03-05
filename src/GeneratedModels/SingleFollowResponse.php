<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SingleFollowResponse extends BaseModel
{
    public function __construct(
        public ?FollowResponse $follow = null,
        public ?bool $notificationCreated = null, // Whether a notification activity was successfully created
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
