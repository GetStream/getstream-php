<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when call recording is ready
 */
class CallRecordingReadyEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?CallRecording $callRecording = null,
        public ?string $type = null,    // The type of event: "call.recording_ready" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
