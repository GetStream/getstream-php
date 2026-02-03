<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $codec
 * @property string|null $trackID
 * @property string|null $trackType
 * @property array<SessionWarningResponse>|null $warnings
 * @property MetricTimeSeries|null $bitrate
 * @property MetricTimeSeries|null $framerate
 * @property ResolutionMetricsTimeSeries|null $resolution
 */
class PublishedTrackMetrics extends BaseModel
{
    public function __construct(
        public ?string $codec = null,
        public ?string $trackID = null,
        public ?string $trackType = null,
        /** @var array<SessionWarningResponse>|null */
        #[ArrayOf(SessionWarningResponse::class)]
        public ?array $warnings = null,
        public ?MetricTimeSeries $bitrate = null,
        public ?MetricTimeSeries $framerate = null,
        public ?ResolutionMetricsTimeSeries $resolution = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
