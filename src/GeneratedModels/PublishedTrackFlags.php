<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $audio
 * @property bool $screenshare
 * @property bool $screenshareAudio
 * @property bool $video
 */
class PublishedTrackFlags extends BaseModel
{
    public function __construct(
        public ?bool $audio = null,
        public ?bool $screenshare = null,
        public ?bool $screenshareAudio = null,
        public ?bool $video = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
