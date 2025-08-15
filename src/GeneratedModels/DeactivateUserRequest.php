<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeactivateUserRequest extends BaseModel
{
    public function __construct(
        public ?string $createdByID = null,    // ID of the user who deactivated the user 
        public ?bool $markMessagesDeleted = null,    // Makes messages appear to be deleted 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
