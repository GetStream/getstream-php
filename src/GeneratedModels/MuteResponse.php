<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $mutes = null,    // Object with mutes (if multiple users were muted) 
        public ?array $nonExistingUsers = null,    // A list of users that can't be found. Common cause for this is deleted users 
        public ?OwnUser $ownUser = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
