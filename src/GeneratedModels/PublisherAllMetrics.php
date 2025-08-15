<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PublisherAllMetrics extends BaseModel
{
    public function __construct(
        public ?PublisherAudioMetrics $audio = null,
        public ?ActiveCallsLatencyStats $rttMs = null,
        public ?PublisherVideoMetrics $video = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
