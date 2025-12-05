<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $continueClosedCaption
 * @property bool|null $continueHLS
 * @property bool|null $continueRTMPBroadcasts
 * @property bool|null $continueRecording
 * @property bool|null $continueTranscription
 */
class StopLiveRequest extends BaseModel
{
    public function __construct(
        public ?bool $continueClosedCaption = null,
        public ?bool $continueHLS = null,
        public ?bool $continueRTMPBroadcasts = null,
        public ?bool $continueRecording = null,
        public ?bool $continueTranscription = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
