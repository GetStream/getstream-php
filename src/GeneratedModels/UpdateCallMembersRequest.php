<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Update call members
 *
 * @property array|null $removeMembers
 * @property array<MemberRequest>|null $updateMembers
 */
class UpdateCallMembersRequest extends BaseModel
{
    public function __construct(
        public ?array $removeMembers = null, // List of userID to remove
        /** @var array<MemberRequest>|null List of members to update or insert */
        #[ArrayOf(MemberRequest::class)]
        public ?array $updateMembers = null, // List of members to update or insert
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
