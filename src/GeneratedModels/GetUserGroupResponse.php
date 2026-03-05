<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for getting a user group
 */
class GetUserGroupResponse extends BaseModel
{
    public function __construct(
        public ?UserGroupResponse $userGroup = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
