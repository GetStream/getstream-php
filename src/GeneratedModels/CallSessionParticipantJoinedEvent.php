<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a participant joins a call session
 */
class CallSessionParticipantJoinedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "call.session_participant_joined" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        public ?CallParticipantResponse $participant = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
