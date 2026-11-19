<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CountReviewQueueResponse extends BaseModel
{
    public function __construct(
        public ?int $total = null, // Number of review queue items matching the filter. When capped is true, at least this many items match.
        public ?bool $capped = null, // Whether more items match than are counted exactly (50,000), so total is a lower bound
        public ?bool $pending = null, // Whether the count is missing or out of date because the queue changed since it was computed. A later request may return a fresher count.
        public ?\DateTime $computedAt = null, // When the count was computed. Counts are refreshed in the background as the review queue changes.
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
