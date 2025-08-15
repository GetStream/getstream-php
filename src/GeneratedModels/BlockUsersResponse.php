<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BlockUsersResponse extends BaseModel
{
    public function __construct(
        public ?string $blockedByUserID = null,    // User id who blocked another user 
        public ?string $blockedUserID = null,    // User id who got blocked 
        public ?\DateTime $createdAt = null,    // Timestamp when the user was blocked 
        public ?string $duration = null,    // Duration of the request in milliseconds 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
