<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallStatsParticipant extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $sessions = null,
        public ?\DateTime $latestActivityAt = null,
        public ?string $name = null,
        public ?array $roles = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
