<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property FeedViewResponse $feedView
 */
class CreateFeedViewResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?FeedViewResponse $feedView = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
