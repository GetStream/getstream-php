<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request body for creating a user group
 */
class CreateUserGroupRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Optional user group ID. If not provided, a UUID v7 will be generated
        public ?string $name = null, // The user friendly name of the user group
        public ?string $description = null, // An optional description for the group
        public ?string $teamID = null, // Optional team ID to scope the group to a team
        public ?array $memberIds = null, // Optional initial list of user IDs to add as members
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
