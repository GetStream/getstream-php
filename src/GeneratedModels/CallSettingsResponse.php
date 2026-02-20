<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallSettingsResponse extends BaseModel
{
    public function __construct(
        public ?AudioSettingsResponse $audio = null,
        public ?BackstageSettingsResponse $backstage = null,
        public ?BroadcastSettingsResponse $broadcasting = null,
        public ?GeofenceSettingsResponse $geofencing = null,
        public ?RecordSettingsResponse $recording = null,
        public ?IndividualRecordingSettingsResponse $individualRecording = null,
        public ?RawRecordingSettingsResponse $rawRecording = null,
        public ?FrameRecordingSettingsResponse $frameRecording = null,
        public ?RingSettingsResponse $ring = null,
        public ?ScreensharingSettingsResponse $screensharing = null,
        public ?TranscriptionSettingsResponse $transcription = null,
        public ?VideoSettingsResponse $video = null,
        public ?ThumbnailsSettingsResponse $thumbnails = null,
        public ?LimitsSettingsResponse $limits = null,
        public ?SessionSettingsResponse $session = null,
        public ?IngressSettingsResponse $ingress = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
