<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class StopLiveRequest extends BaseModel
{
    public function __construct(
        public ?bool $continueHLS = null,
        public ?bool $continueRecording = null,
        public ?bool $continueCompositeRecording = null,
        public ?bool $continueIndividualRecording = null,
        public ?bool $continueRawRecording = null,
        public ?bool $continueTranscription = null,
        public ?bool $continueClosedCaption = null,
        public ?bool $continueRTMPBroadcasts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
