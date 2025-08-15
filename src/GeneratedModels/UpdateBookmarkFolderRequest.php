<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateBookmarkFolderRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // Name of the folder 
        public ?string $userID = null,
        public ?object $custom = null,    // Custom data for the folder 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
