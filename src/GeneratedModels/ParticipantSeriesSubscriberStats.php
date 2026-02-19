<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ParticipantSeriesSubscriberStats extends BaseModel
{
    public function __construct(
        public ?array $global = null,
        /** @var array<string, MetricDescriptor>|null */
        #[MapOf(MetricDescriptor::class)]
        public ?array $globalMeta = null,
        public ?array $globalMetricsOrder = null,
        public ?array $globalThresholds = null,
        /** @var array<ParticipantSeriesSubscriptionTrackMetrics>|null */
        #[ArrayOf(ParticipantSeriesSubscriptionTrackMetrics::class)]
        public ?array $subscriptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
