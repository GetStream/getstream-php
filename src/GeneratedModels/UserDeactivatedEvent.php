<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UserDeactivatedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?User $createdBy = null,
        public ?string $type = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
