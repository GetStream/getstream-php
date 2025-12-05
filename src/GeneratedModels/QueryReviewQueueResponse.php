<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ReviewQueueItemResponse> $items
 * @property array $actionConfig
 * @property object $stats
 * @property string|null $next
 * @property string|null $prev
 * @property FilterConfigResponse|null $filterConfig
 */
class QueryReviewQueueResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ReviewQueueItemResponse>|null List of review queue items */
        #[ArrayOf(ReviewQueueItemResponse::class)]
        public ?array $items = null, // List of review queue items
        public ?array $actionConfig = null, // Configuration for moderation actions
        public ?object $stats = null, // Statistics about the review queue
        public ?string $next = null,
        public ?string $prev = null,
        public ?FilterConfigResponse $filterConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
