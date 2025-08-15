<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MuteRequest extends BaseModel
{
    public function __construct(
        public ?array $targetIds = null,    // User IDs to mute (if multiple users) 
        public ?int $timeout = null,    // Duration of mute in minutes 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
