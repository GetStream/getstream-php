<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $publisherType
 * @property string $userID
 * @property string $userSessionID
 * @property array $roles
 * @property int|null $durationInSeconds
 * @property \DateTime|null $joinedAt
 * @property \DateTime|null $leftAt
 */
class ParticipantSessionDetails extends BaseModel
{
    public function __construct(
        public ?string $publisherType = null,
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?array $roles = null,
        public ?int $durationInSeconds = null,
        public ?\DateTime $joinedAt = null,
        public ?\DateTime $leftAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
