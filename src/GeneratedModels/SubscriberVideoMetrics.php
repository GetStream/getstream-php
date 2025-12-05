<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property ActiveCallsFPSStats|null $fps30
 * @property ActiveCallsLatencyStats|null $jitterMs
 * @property ActiveCallsLatencyStats|null $packetsLostPct
 */
class SubscriberVideoMetrics extends BaseModel
{
    public function __construct(
        public ?ActiveCallsFPSStats $fps30 = null,
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsLatencyStats $packetsLostPct = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
