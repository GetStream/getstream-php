<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReactivateUserRequest extends BaseModel
{
    public function __construct(
        public ?string $createdByID = null,    // ID of the user who's reactivating the user 
        public ?string $name = null,    // Set this field to put new name for the user 
        public ?bool $restoreMessages = null,    // Restore previously deleted messages 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
