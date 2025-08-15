<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressResponse extends BaseModel
{
    public function __construct(
        public ?bool $broadcasting = null,
        public ?array $rtmps = null,
        public ?FrameRecordingResponse $frameRecording = null,
        public ?EgressHLSResponse $hls = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
