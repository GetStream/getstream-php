<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BroadcastSettingsRequest extends BaseModel
{
    public function __construct(
        public ?HLSSettingsRequest $hls = null,
        public ?RTMPSettingsRequest $rtmp = null,
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
