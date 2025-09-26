<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a participant leaves a call session
 */
class CallSessionParticipantLeftEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?int $durationSeconds = null,    // The duration participant was in the session in seconds 
        public ?string $sessionID = null,    // Call session ID 
        public ?CallParticipantResponse $participant = null,
        public ?string $type = null,    // The type of event: "call.session_participant_left" in this case 
        public ?string $reason = null,    // The reason why the participant left the session 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
