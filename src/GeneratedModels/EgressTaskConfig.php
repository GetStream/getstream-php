<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressTaskConfig extends BaseModel
{
    public function __construct(
        public ?EgressUser $egressUser = null,
        public ?FrameRecordingEgressConfig $frameRecordingEgressConfig = null,
        public ?HLSEgressConfig $hlsEgressConfig = null,
        public ?RecordingEgressConfig $recordingEgressConfig = null,
        public ?RTMPEgressConfig $rtmpEgressConfig = null,
        public ?STTEgressConfig $sttEgressConfig = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
