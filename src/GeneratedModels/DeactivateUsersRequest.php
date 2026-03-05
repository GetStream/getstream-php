<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Deactivate users request
 */
class DeactivateUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null, // User IDs to deactivate
        public ?bool $markMessagesDeleted = null, // Makes messages appear to be deleted
        public ?string $createdByID = null, // ID of the user who deactivated the users
        public ?bool $markChannelsDeleted = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
