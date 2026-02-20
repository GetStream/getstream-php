<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallSettingsRequest extends BaseModel
{
    public function __construct(
        public ?AudioSettingsRequest $audio = null,
        public ?BackstageSettingsRequest $backstage = null,
        public ?GeofenceSettingsRequest $geofencing = null,
        public ?VideoSettingsRequest $video = null,
        public ?RecordSettingsRequest $recording = null,
        public ?IndividualRecordingSettingsRequest $individualRecording = null,
        public ?RawRecordingSettingsRequest $rawRecording = null,
        public ?FrameRecordingSettingsRequest $frameRecording = null,
        public ?RingSettingsRequest $ring = null,
        public ?ScreensharingSettingsRequest $screensharing = null,
        public ?TranscriptionSettingsRequest $transcription = null,
        public ?BroadcastSettingsRequest $broadcasting = null,
        public ?ThumbnailsSettingsRequest $thumbnails = null,
        public ?LimitsSettingsRequest $limits = null,
        public ?SessionSettingsRequest $session = null,
        public ?IngressSettingsRequest $ingress = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
