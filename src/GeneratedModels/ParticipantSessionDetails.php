<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ParticipantSessionDetails extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?string $userSessionID = null,
        public ?\DateTime $joinedAt = null,
        public ?\DateTime $leftAt = null,
        public ?string $publisherType = null,
        public ?array $roles = null,
        public ?int $durationInSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
