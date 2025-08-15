<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request for exporting feed user data
 */
class ExportFeedUserDataRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $image = null,
        public ?bool $invisible = null,
        public ?string $language = null,
        public ?string $name = null,
        public ?string $role = null,
        public ?array $teams = null,
        public ?object $custom = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?array $teamsRole = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
