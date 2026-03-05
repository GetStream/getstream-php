<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallTranscription represents a transcription of a call.
 */
class CallTranscription extends BaseModel
{
    public function __construct(
        public ?string $filename = null,
        public ?string $url = null,
        public ?\DateTime $startTime = null,
        public ?\DateTime $endTime = null,
        public ?string $sessionID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
