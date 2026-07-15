<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateQueueRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?object $filters = null,
        public ?array $sort = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
