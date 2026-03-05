<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ParticipantSeriesUserStats extends BaseModel
{
    public function __construct(
        public ?array $metrics = null,
        /** @var array<string, MetricDescriptor>|null */
        #[MapOf(MetricDescriptor::class)]
        public ?array $metricsMeta = null,
        public ?array $metricsOrder = null,
        public ?array $thresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
