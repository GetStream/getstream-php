<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryReviewQueueResponse extends BaseModel
{
    public function __construct(
        /** @var array<ReviewQueueItemResponse>|null */
        #[ArrayOf(ReviewQueueItemResponse::class)]
        public ?array $items = null, // List of review queue items
        public ?array $actionConfig = null, // Configuration for moderation actions
        public ?FilterConfigResponse $filterConfig = null,
        public ?object $stats = null, // Statistics about the review queue
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
