<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * User request object
 */
class UserRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // User ID
        public ?string $name = null, // Optional name of user
        public ?string $image = null, // User's profile image URL
        public ?object $custom = null, // Custom user data
        public ?string $language = null,
        public ?bool $invisible = null,
        public ?PrivacySettingsResponse $privacySettings = null,
        public ?string $role = null, // User's global role
        public ?array $teamsRole = null, // Map of team-specific roles for the user
        public ?array $teams = null, // List of teams the user belongs to
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
