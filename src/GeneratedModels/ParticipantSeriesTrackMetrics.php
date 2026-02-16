<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ParticipantSeriesTrackMetrics extends BaseModel
{
    public function __construct(
        public ?string $trackID = null,
        public ?string $codec = null,
        public ?string $label = null,
        public ?string $rid = null,
        public ?string $trackType = null,
        public ?array $metricsOrder = null,
        public ?array $metrics = null,
        /** @var array<MetricDescriptor>|null */
        #[ArrayOf(MetricDescriptor::class)]
        public ?array $metricsMeta = null,
        public ?array $thresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
