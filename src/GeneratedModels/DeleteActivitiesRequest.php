<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteActivitiesRequest extends BaseModel
{
    public function __construct(
        public ?array $ids = null, // List of activity IDs to delete
        public ?bool $deleteNotificationActivity = null, // Whether to also delete any notification activities created from mentions in these activities
        public ?bool $hardDelete = null, // Whether to permanently delete the activities
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
