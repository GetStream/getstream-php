<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SpeechSegmentConfig extends BaseModel
{
    public function __construct(
        public ?int $maxSpeechCaptionMs = null,
        public ?int $silenceDurationMs = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
