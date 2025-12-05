<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing active calls status information
 *
 * @property string $duration
 * @property \DateTime $endTime
 * @property \DateTime $startTime
 * @property ActiveCallsMetrics|null $metrics
 * @property ActiveCallsSummary|null $summary
 */
class GetActiveCallsStatusResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?\DateTime $endTime = null, // End time of the status period
        public ?\DateTime $startTime = null, // Start time of the status period
        public ?ActiveCallsMetrics $metrics = null,
        public ?ActiveCallsSummary $summary = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
