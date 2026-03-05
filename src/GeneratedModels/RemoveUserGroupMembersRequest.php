<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request body for removing members from a user group
 */
class RemoveUserGroupMembersRequest extends BaseModel
{
    public function __construct(
        public ?array $memberIds = null, // List of user IDs to remove
        public ?string $teamID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
