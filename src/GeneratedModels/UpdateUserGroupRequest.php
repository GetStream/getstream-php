<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request body for updating a user group
 */
class UpdateUserGroupRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // The new name of the user group
        public ?string $description = null, // The new description for the group
        public ?string $teamID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
