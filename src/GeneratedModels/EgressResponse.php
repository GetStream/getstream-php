<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EgressResponse extends BaseModel
{
    public function __construct(
        public ?bool $broadcasting = null,
        public ?EgressHLSResponse $hls = null,
        /** @var array<EgressRTMPResponse>|null */
        #[ArrayOf(EgressRTMPResponse::class)]
        public ?array $rtmps = null,
        public ?FrameRecordingResponse $frameRecording = null,
        public ?CompositeRecordingResponse $compositeRecording = null,
        public ?IndividualRecordingResponse $individualRecording = null,
        public ?RawRecordingResponse $rawRecording = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
