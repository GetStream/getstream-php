<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call recording is ready
 */
class CallRecordingReadyEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.recording_ready" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?CallRecording $callRecording = null,
        public ?string $egressID = null,
        public ?string $recordingType = null, // The type of recording
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
