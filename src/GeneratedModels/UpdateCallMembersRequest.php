<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Update call members
 */
class UpdateCallMembersRequest extends BaseModel
{
    public function __construct(
        public ?array $removeMembers = null,    // List of userID to remove 
        public ?array $updateMembers = null,    // List of members to update or insert 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
