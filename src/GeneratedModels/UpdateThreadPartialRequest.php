<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateThreadPartialRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?string $userID = null,
        public ?object $set = null, // Sets new field values
        public ?array $unset = null, // Array of field names to unset
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
