<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when frame recording has stopped
 */
class CallFrameRecordingStoppedEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.frame_recording_stopped" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $egressID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
