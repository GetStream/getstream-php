<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $maxParticipantsExcludeRoles
 * @property int|null $maxDurationSeconds
 * @property int|null $maxParticipants
 * @property bool|null $maxParticipantsExcludeOwner
 */
class LimitsSettingsResponse extends BaseModel
{
    public function __construct(
        public ?array $maxParticipantsExcludeRoles = null,
        public ?int $maxDurationSeconds = null,
        public ?int $maxParticipants = null,
        public ?bool $maxParticipantsExcludeOwner = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
