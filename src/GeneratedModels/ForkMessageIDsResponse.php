<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ForkMessageIDsResponse extends BaseModel
{
    public function __construct(
        public ?array $messageIDMap = null, // Maps each given source message ID the fork holds a copy of to the copy's ID. IDs the fork holds no copy of are left out
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
