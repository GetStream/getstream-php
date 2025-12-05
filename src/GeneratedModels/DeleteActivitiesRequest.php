<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $ids
 * @property bool|null $hardDelete
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class DeleteActivitiesRequest extends BaseModel
{
    public function __construct(
        public ?array $ids = null, // List of activity IDs to delete
        public ?bool $hardDelete = null, // Whether to permanently delete the activities
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
