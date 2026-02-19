<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VideoReactionsResponse extends BaseModel
{
    public function __construct(
        public ?VideoReactionOverTimeResponse $countOverTime = null,
        public ?string $reaction = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
