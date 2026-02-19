<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateFeedsBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<FeedResponse>|null */
        #[ArrayOf(FeedResponse::class)]
        public ?array $feeds = null, // List of created feeds
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
