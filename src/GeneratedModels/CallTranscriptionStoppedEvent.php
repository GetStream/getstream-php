<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call transcription has stopped
 */
class CallTranscriptionStoppedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.transcription_stopped" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $egressID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
