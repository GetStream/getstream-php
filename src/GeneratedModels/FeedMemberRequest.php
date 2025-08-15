<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FeedMemberRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,    // ID of the user to add as a member 
        public ?bool $invite = null,    // Whether this is an invite to become a member 
        public ?string $membershipLevel = null,    // ID of the membership level to assign to the member 
        public ?string $role = null,    // Role of the member in the feed 
        public ?object $custom = null,    // Custom data for the member 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
