<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateFeedsBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FeedRequest>|null */
        #[ArrayOf(FeedRequest::class)]
        public ?array $feeds = null, // List of feeds to create
        public ?bool $enrichOwnFields = null, // If true, enriches the created feeds with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
