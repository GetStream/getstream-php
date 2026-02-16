<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ParticipantSeriesSubscriberStats extends BaseModel
{
    public function __construct(
        public ?array $globalMetricsOrder = null,
        /** @var array<ParticipantSeriesSubscriptionTrackMetrics>|null */
        #[ArrayOf(ParticipantSeriesSubscriptionTrackMetrics::class)]
        public ?array $subscriptions = null,
        public ?array $global = null,
        /** @var array<MetricDescriptor>|null */
        #[ArrayOf(MetricDescriptor::class)]
        public ?array $globalMeta = null,
        public ?array $globalThresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
