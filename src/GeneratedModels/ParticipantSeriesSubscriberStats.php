<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array|null $globalMetricsOrder
 * @property array<ParticipantSeriesSubscriptionTrackMetrics>|null $subscriptions
 * @property array|null $global
 * @property array|null $globalMeta
 * @property array|null $globalThresholds
 */
class ParticipantSeriesSubscriberStats extends BaseModel
{
    public function __construct(
        public ?array $globalMetricsOrder = null,
        /** @var array<ParticipantSeriesSubscriptionTrackMetrics>|null */
        #[ArrayOf(ParticipantSeriesSubscriptionTrackMetrics::class)]
        public ?array $subscriptions = null,
        public ?array $global = null,
        public ?array $globalMeta = null,
        public ?array $globalThresholds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
