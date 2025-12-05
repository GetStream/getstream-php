<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<FeedResponse> $feeds
 */
class CreateFeedsBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<FeedResponse>|null List of created feeds */
        #[ArrayOf(FeedResponse::class)]
        public ?array $feeds = null, // List of created feeds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
