<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for searching user groups
 */
class SearchUserGroupsResponse extends BaseModel
{
    public function __construct(
        /** @var array<UserGroupResponse>|null */
        #[ArrayOf(UserGroupResponse::class)]
        public ?array $userGroups = null, // List of matching user groups
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
