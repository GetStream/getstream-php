<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * MemberResponse is the payload for a member of a call.
 */
class MemberResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?string $userID = null,
        public ?object $custom = null,    // Custom member response data 
        public ?UserResponse $user = null,
        public ?\DateTime $deletedAt = null,    // Date/time of deletion 
        public ?string $role = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
