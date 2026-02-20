<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call transcription is ready
 */
class CallTranscriptionReadyEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.transcription_ready" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?CallTranscription $callTranscription = null,
        public ?string $egressID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
