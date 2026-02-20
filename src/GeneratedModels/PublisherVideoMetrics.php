<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PublisherVideoMetrics extends BaseModel
{
    public function __construct(
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsFPSStats $fps30 = null,
        public ?ActiveCallsLatencyStats $frameEncodingTimeMs = null,
        public ?ActiveCallsResolutionStats $resolution = null,
        public ?ActiveCallsBitrateStats $bitrate = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
