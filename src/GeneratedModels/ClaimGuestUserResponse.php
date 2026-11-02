<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ClaimGuestUserResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $taskID = null, // ID of the task that moves the guest's channels, messages and reactions to the claiming user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
