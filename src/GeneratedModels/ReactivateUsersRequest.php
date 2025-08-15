<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Reactivate users in batches
 */
class ReactivateUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null,    // User IDs to reactivate 
        public ?string $createdByID = null,    // ID of the user who's reactivating the users 
        public ?bool $restoreChannels = null,
        public ?bool $restoreMessages = null,    // Restore previously deleted messages 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
