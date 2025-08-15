<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSettings extends BaseModel
{
    public function __construct(
        public ?AudioSettings $audio = null,
        public ?BackstageSettings $backstage = null,
        public ?BroadcastSettings $broadcasting = null,
        public ?FrameRecordSettings $frameRecording = null,
        public ?GeofenceSettings $geofencing = null,
        public ?IngressSettings $ingress = null,
        public ?LimitsSettings $limits = null,
        public ?RecordSettings $recording = null,
        public ?RingSettings $ring = null,
        public ?ScreensharingSettings $screensharing = null,
        public ?SessionSettings $session = null,
        public ?ThumbnailsSettings $thumbnails = null,
        public ?TranscriptionSettings $transcription = null,
        public ?VideoSettings $video = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
