<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Ban information
 */
class BanInfoResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $createdBy = null,
        public ?UserResponse $user = null,
        public ?\DateTime $expires = null, // When the ban expires
        public ?string $reason = null, // Reason for the ban
        public ?bool $shadow = null, // Whether this is a shadow ban
        public ?\DateTime $createdAt = null, // When the ban was created
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
