<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallTranscription represents a transcription of a call.
 *
 * @property \DateTime $endTime
 * @property string $filename
 * @property string $sessionID
 * @property \DateTime $startTime
 * @property string $url
 */
class CallTranscription extends BaseModel
{
    public function __construct(
        public ?\DateTime $endTime = null,
        public ?string $filename = null,
        public ?string $sessionID = null,
        public ?\DateTime $startTime = null,
        public ?string $url = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
