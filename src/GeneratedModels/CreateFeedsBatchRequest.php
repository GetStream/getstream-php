<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<FeedRequest> $feeds
 */
class CreateFeedsBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FeedRequest>|null List of feeds to create */
        #[ArrayOf(FeedRequest::class)]
        public ?array $feeds = null, // List of feeds to create
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
