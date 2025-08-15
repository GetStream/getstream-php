<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class LimitsSettingsRequest extends BaseModel
{
    public function __construct(
        public ?int $maxDurationSeconds = null,
        public ?int $maxParticipants = null,
        public ?bool $maxParticipantsExcludeOwner = null,
        public ?array $maxParticipantsExcludeRoles = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
