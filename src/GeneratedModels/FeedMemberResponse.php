<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedMemberResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // When the membership was created 
        public ?string $role = null,    // Role of the member in the feed 
        public ?string $status = null,    // Status of the membership 
        public ?\DateTime $updatedAt = null,    // When the membership was last updated 
        public ?UserResponse $user = null,
        public ?\DateTime $inviteAcceptedAt = null,    // When the invite was accepted 
        public ?\DateTime $inviteRejectedAt = null,    // When the invite was rejected 
        public ?object $custom = null,    // Custom data for the membership 
        public ?MembershipLevelResponse $membershipLevel = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
