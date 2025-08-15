<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallParticipantResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $joinedAt = null,
        public ?string $role = null,
        public ?string $userSessionID = null,
        public ?UserResponse $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
