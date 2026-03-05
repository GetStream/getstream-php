<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallSettings extends BaseModel
{
    public function __construct(
        public ?AudioSettings $audio = null,
        public ?BackstageSettings $backstage = null,
        public ?VideoSettings $video = null,
        public ?ScreensharingSettings $screensharing = null,
        public ?RecordSettings $recording = null,
        public ?FrameRecordSettings $frameRecording = null,
        public ?IndividualRecordSettings $individualRecording = null,
        public ?RawRecordSettings $rawRecording = null,
        public ?BroadcastSettings $broadcasting = null,
        public ?GeofenceSettings $geofencing = null,
        public ?TranscriptionSettings $transcription = null,
        public ?RingSettings $ring = null,
        public ?ThumbnailsSettings $thumbnails = null,
        public ?LimitsSettings $limits = null,
        public ?SessionSettings $session = null,
        public ?IngressSettings $ingress = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
