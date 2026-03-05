<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateFeedGroupResponse extends BaseModel
{
    public function __construct(
        public ?FeedGroupResponse $feedGroup = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
