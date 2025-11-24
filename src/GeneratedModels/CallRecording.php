<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallRecording represents a recording of a call.
 */
class CallRecording extends BaseModel
{
    public function __construct(
        public ?\DateTime $endTime = null,
        public ?string $filename = null,
        public ?string $recordingType = null,
        public ?string $sessionID = null,
        public ?\DateTime $startTime = null,
        public ?string $url = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
