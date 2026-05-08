<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkDeleteActionConfigRequest extends BaseModel
{
    public function __construct(
        public ?array $ids = null, // UUIDs of the action configs to delete
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
