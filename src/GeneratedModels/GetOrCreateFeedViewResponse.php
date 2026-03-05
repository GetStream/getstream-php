<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedViewResponse extends BaseModel
{
    public function __construct(
        public ?FeedViewResponse $feedView = null,
        public ?bool $wasCreated = null, // Indicates whether the feed view was newly created (true) or already existed (false)
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
