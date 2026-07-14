<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ShareResponse extends BaseModel
{
    public function __construct(
        public ?UserResponse $user = null,
        public ?string $activityID = null, // ID of the sharing (child) activity
        public ?\DateTime $createdAt = null, // When the share occurred
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
