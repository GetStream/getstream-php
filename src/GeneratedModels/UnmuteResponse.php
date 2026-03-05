<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnmuteResponse extends BaseModel
{
    public function __construct(
        public ?array $nonExistingUsers = null, // A list of users that can't be found. Common cause for this is deleted users
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
