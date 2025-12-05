<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property HLSSettings|null $hls
 * @property RTMPSettings|null $rtmp
 */
class BroadcastSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?HLSSettings $hls = null,
        public ?RTMPSettings $rtmp = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
