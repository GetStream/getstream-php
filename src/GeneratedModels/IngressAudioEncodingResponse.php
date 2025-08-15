<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class IngressAudioEncodingResponse extends BaseModel
{
    public function __construct(
        public ?int $bitrate = null,
        public ?int $channels = null,
        public ?bool $enableDtx = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
