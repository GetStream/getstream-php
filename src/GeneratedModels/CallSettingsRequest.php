<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property AudioSettingsRequest|null $audio
 * @property BackstageSettingsRequest|null $backstage
 * @property BroadcastSettingsRequest|null $broadcasting
 * @property FrameRecordingSettingsRequest|null $frameRecording
 * @property GeofenceSettingsRequest|null $geofencing
 * @property IngressSettingsRequest|null $ingress
 * @property LimitsSettingsRequest|null $limits
 * @property RecordSettingsRequest|null $recording
 * @property RingSettingsRequest|null $ring
 * @property ScreensharingSettingsRequest|null $screensharing
 * @property SessionSettingsRequest|null $session
 * @property ThumbnailsSettingsRequest|null $thumbnails
 * @property TranscriptionSettingsRequest|null $transcription
 * @property VideoSettingsRequest|null $video
 */
class CallSettingsRequest extends BaseModel
{
    public function __construct(
        public ?AudioSettingsRequest $audio = null,
        public ?BackstageSettingsRequest $backstage = null,
        public ?BroadcastSettingsRequest $broadcasting = null,
        public ?FrameRecordingSettingsRequest $frameRecording = null,
        public ?GeofenceSettingsRequest $geofencing = null,
        public ?IngressSettingsRequest $ingress = null,
        public ?LimitsSettingsRequest $limits = null,
        public ?RecordSettingsRequest $recording = null,
        public ?RingSettingsRequest $ring = null,
        public ?ScreensharingSettingsRequest $screensharing = null,
        public ?SessionSettingsRequest $session = null,
        public ?ThumbnailsSettingsRequest $thumbnails = null,
        public ?TranscriptionSettingsRequest $transcription = null,
        public ?VideoSettingsRequest $video = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
