<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when the participant counts in a call session are updated
 *
 * @property int $anonymousParticipantCount
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $sessionID
 * @property array $participantsCountByRole
 * @property string $type
 */
class CallSessionParticipantCountsUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?int $anonymousParticipantCount = null,
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $sessionID = null, // Call session ID
        public ?array $participantsCountByRole = null,
        public ?string $type = null, // The type of event: "call.session_participant_count_updated" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
