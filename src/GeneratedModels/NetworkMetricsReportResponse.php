<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $averageConnectionTime
 * @property int|null $averageJitter
 * @property int|null $averageLatency
 * @property int|null $averageTimeToReconnect
 */
class NetworkMetricsReportResponse extends BaseModel
{
    public function __construct(
        public ?int $averageConnectionTime = null,
        public ?int $averageJitter = null,
        public ?int $averageLatency = null,
        public ?int $averageTimeToReconnect = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
