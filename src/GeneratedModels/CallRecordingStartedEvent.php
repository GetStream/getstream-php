<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call recording has started
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $egressID
 * @property string $type
 */
class CallRecordingStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $egressID = null,
        public ?string $type = null, // The type of event: "call.recording_started" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
