<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallSettingsResponse extends BaseModel
{
    public function __construct(
        public ?AudioSettingsResponse $audio = null,
        public ?BackstageSettingsResponse $backstage = null,
        public ?BroadcastSettingsResponse $broadcasting = null, // BroadcastSettingsResponse is the payload for broadcasting settings
        public ?GeofenceSettingsResponse $geofencing = null,
        public ?RecordSettingsResponse $recording = null, // RecordSettings is the payload for recording settings
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
        public ?EncryptionSettingsResponse $encryption = null, // EncryptionSettings is the payload for end-to-end encryption settings
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
