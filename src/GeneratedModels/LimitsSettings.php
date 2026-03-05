<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LimitsSettings extends BaseModel
{
    public function __construct(
        public ?int $maxParticipants = null,
        public ?array $maxParticipantsExcludeRoles = null,
        public ?bool $maxParticipantsExcludeOwner = null,
        public ?int $maxDurationSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
