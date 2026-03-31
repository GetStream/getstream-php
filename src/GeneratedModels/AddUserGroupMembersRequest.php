<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request body for adding members to a user group
 */
class AddUserGroupMembersRequest extends BaseModel
{
    public function __construct(
        public ?array $memberIds = null, // List of user IDs to add as members
        public ?bool $asAdmin = null, // Whether to add the members as group admins. Defaults to false
        public ?string $teamID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
