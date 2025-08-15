<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallMember extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $role = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?\DateTime $deletedAt = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
