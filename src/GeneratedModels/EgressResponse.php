<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $broadcasting
 * @property array<EgressRTMPResponse> $rtmps
 * @property FrameRecordingResponse|null $frameRecording
 * @property EgressHLSResponse|null $hls
 */
class EgressResponse extends BaseModel
{
    public function __construct(
        public ?bool $broadcasting = null,
        /** @var array<EgressRTMPResponse>|null */
        #[ArrayOf(EgressRTMPResponse::class)]
        public ?array $rtmps = null,
        public ?FrameRecordingResponse $frameRecording = null,
        public ?EgressHLSResponse $hls = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
