<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property SubscriberAudioMetrics|null $audio
 * @property ActiveCallsLatencyStats|null $rttMs
 * @property SubscriberVideoMetrics|null $video
 */
class SubscriberAllMetrics extends BaseModel
{
    public function __construct(
        public ?SubscriberAudioMetrics $audio = null,
        public ?ActiveCallsLatencyStats $rttMs = null,
        public ?SubscriberVideoMetrics $video = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
