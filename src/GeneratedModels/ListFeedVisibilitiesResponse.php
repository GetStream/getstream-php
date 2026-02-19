<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ListFeedVisibilitiesResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, FeedVisibilityResponse>|null */
        #[MapOf(FeedVisibilityResponse::class)]
        public ?array $feedVisibilities = null, // Map of feed visibility configurations by name
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
