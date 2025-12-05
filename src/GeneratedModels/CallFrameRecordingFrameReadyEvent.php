<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a frame is captured from a call
 *
 * @property string $callCid
 * @property \DateTime $capturedAt
 * @property \DateTime $createdAt
 * @property string $egressID
 * @property string $sessionID
 * @property string $trackType
 * @property string $url
 * @property array $users
 * @property string $type
 */
class CallFrameRecordingFrameReadyEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $capturedAt = null, // The time the frame was captured
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?string $sessionID = null, // Call session ID
        public ?string $trackType = null, // The type of the track frame was captured from (TRACK_TYPE_VIDEO|TRACK_TYPE_SCREEN_SHARE)
        public ?string $url = null, // The URL of the frame
        public ?array $users = null, // The users in the frame
        public ?string $type = null, // The type of event: "call.frame_recording_ready" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
