<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallParticipantResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $userSessionID = null,
        public ?string $role = null,
        public ?\DateTime $joinedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
