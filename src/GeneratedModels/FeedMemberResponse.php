<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedMemberResponse extends BaseModel
{
    public function __construct(
        public ?MembershipLevelResponse $membershipLevel = null,
        public ?UserResponse $user = null,
        public ?string $role = null, // Role of the member in the feed
        public ?string $status = null, // Status of the membership. One of: member, pending, rejected
        public ?\DateTime $inviteAcceptedAt = null, // When the invite was accepted
        public ?\DateTime $inviteRejectedAt = null, // When the invite was rejected
        public ?object $custom = null, // Custom data for the membership
        public ?\DateTime $createdAt = null, // When the membership was created
        public ?\DateTime $updatedAt = null, // When the membership was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
