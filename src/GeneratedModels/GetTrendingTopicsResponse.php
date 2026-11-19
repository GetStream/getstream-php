<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Trending topics ranked for the user
 */
class GetTrendingTopicsResponse extends BaseModel
{
    public function __construct(
        /** @var array<TrendingTopicResponse>|null */
        #[ArrayOf(TrendingTopicResponse::class)]
        public ?array $topics = null, // Topics by descending score, then ascending tag
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
