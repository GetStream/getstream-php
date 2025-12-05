<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Deactivate users request
 *
 * @property array $userIds
 * @property string|null $createdByID
 * @property bool|null $markChannelsDeleted
 * @property bool|null $markMessagesDeleted
 */
class DeactivateUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null, // User IDs to deactivate
        public ?string $createdByID = null, // ID of the user who deactivated the users
        public ?bool $markChannelsDeleted = null,
        public ?bool $markMessagesDeleted = null, // Makes messages appear to be deleted
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
