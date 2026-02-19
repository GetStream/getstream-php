<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateChannelPartialRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?object $set = null,
        public ?array $unset = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
