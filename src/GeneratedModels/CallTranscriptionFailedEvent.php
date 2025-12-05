<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call transcription has failed
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $egressID
 * @property string $type
 * @property string|null $error
 */
class CallTranscriptionFailedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?string $type = null, // The type of event: "call.transcription_failed" in this case
        public ?string $error = null, // The error message detailing why transcription failed.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
