<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PublishedTrackMetrics extends BaseModel
{
    public function __construct(
        public ?MetricTimeSeries $bitrate = null,
        public ?MetricTimeSeries $framerate = null,
        public ?ResolutionMetricsTimeSeries $resolution = null,
        public ?string $trackID = null,
        public ?string $trackType = null,
        public ?string $codec = null,
        /** @var array<SessionWarningResponse>|null */
        #[ArrayOf(SessionWarningResponse::class)]
        public ?array $warnings = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
