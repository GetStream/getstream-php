<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeactivateUserRequest extends BaseModel
{
    public function __construct(
        public ?bool $markMessagesDeleted = null, // Makes messages appear to be deleted
        public ?string $createdByID = null, // ID of the user who deactivated the user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
