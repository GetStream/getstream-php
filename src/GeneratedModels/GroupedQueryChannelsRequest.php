<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedQueryChannelsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Max channels per bucket (default 10)
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
