<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateUnfollowResponse extends BaseModel
{
    public function __construct(
        public ?FollowResponse $follow = null,
        public ?bool $deleted = null, // True if a follow was found and removed by this request; false if no follow existed
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
