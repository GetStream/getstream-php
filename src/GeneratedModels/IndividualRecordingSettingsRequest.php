<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IndividualRecordingSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Recording mode. One of: available, disabled, auto-on
        public ?array $outputTypes = null, // Output types to include: audio_only, video_only, audio_video, screenshare_audio_only, screenshare_video_only, screenshare_audio_video
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
