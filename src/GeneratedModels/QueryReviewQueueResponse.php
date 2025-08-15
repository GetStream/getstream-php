<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryReviewQueueResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $items = null,    // List of review queue items 
        public ?array $actionConfig = null,    // Configuration for moderation actions 
        public ?object $stats = null,    // Statistics about the review queue 
        public ?string $next = null,
        public ?string $prev = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
