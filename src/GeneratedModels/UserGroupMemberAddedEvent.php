<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when members are added to a user group.
 */
class UserGroupMemberAddedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "user_group.member_added" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?UserGroup $userGroup = null,
        public ?array $members = null, // The user IDs that were added
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
