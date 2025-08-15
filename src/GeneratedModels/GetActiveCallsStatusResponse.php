<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response containing active calls status information
 */
class GetActiveCallsStatusResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?\DateTime $endTime = null,    // End time of the status period 
        public ?\DateTime $startTime = null,    // Start time of the status period 
        public ?ActiveCallsMetrics $metrics = null,
        public ?ActiveCallsSummary $summary = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
