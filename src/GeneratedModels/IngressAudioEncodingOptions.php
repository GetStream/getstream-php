<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressAudioEncodingOptions extends BaseModel
{
    public function __construct(
        public ?int $channels = null,
        public ?bool $enableDtx = null,
        public ?int $bitrate = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
