<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NetworkMetricsReportResponse extends BaseModel
{
    public function __construct(
        public ?float $averageLatency = null,
        public ?float $averageJitter = null,
        public ?float $averageConnectionTime = null,
        public ?float $averageTimeToReconnect = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
