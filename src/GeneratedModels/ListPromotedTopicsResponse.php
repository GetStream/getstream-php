<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The app's active promotions
 */
class ListPromotedTopicsResponse extends BaseModel
{
    public function __construct(
        /** @var array<PromotedTopicResponse>|null */
        #[ArrayOf(PromotedTopicResponse::class)]
        public ?array $promotedTopics = null, // The active promotions, oldest first
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
