<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ParticipantSeriesPublisherStats extends BaseModel
{
    public function __construct(
        public ?array $globalMetricsOrder = null,
        public ?array $global = null,
        /** @var array<MetricDescriptor>|null */
        #[ArrayOf(MetricDescriptor::class)]
        public ?array $globalMeta = null,
        public ?array $globalThresholds = null,
        public ?array $tracks = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
