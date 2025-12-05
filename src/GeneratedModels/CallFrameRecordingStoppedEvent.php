<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when frame recording has stopped
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $egressID
 * @property CallResponse $call
 * @property string $type
 */
class CallFrameRecordingStoppedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.frame_recording_stopped" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
