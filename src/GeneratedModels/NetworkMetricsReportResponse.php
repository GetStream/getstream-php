<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NetworkMetricsReportResponse extends BaseModel
{
    public function __construct(
        public ?int $averageLatency = null,
        public ?int $averageJitter = null,
        public ?int $averageConnectionTime = null,
        public ?int $averageTimeToReconnect = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
