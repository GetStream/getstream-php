<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserGroupResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $teamID = null,
        /** @var array<UserGroupMember>|null */
        #[ArrayOf(UserGroupMember::class)]
        public ?array $members = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $createdBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
