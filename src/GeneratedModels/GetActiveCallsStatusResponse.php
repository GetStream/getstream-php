<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing active calls status information
 */
class GetActiveCallsStatusResponse extends BaseModel
{
    public function __construct(
        public ?ActiveCallsMetrics $metrics = null,
        public ?ActiveCallsSummary $summary = null,
        public ?string $duration = null,
        public ?\DateTime $startTime = null, // Start time of the status period
        public ?\DateTime $endTime = null, // End time of the status period
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
