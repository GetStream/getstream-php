<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
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
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
