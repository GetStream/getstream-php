<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property ActiveCallsLatencyStats|null $concealmentPct
 * @property ActiveCallsLatencyStats|null $jitterMs
 * @property ActiveCallsLatencyStats|null $packetsLostPct
 */
class SubscriberAudioMetrics extends BaseModel
{
    public function __construct(
        public ?ActiveCallsLatencyStats $concealmentPct = null,
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsLatencyStats $packetsLostPct = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
