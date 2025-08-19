<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PublisherVideoMetrics extends BaseModel
{
    public function __construct(
        public ?ActiveCallsBitrateStats $bitrate = null,
        public ?ActiveCallsFPSStats $fps30 = null,
        public ?ActiveCallsLatencyStats $frameEncodingTimeMs = null,
        public ?ActiveCallsLatencyStats $jitterMs = null,
        public ?ActiveCallsResolutionStats $resolution = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
