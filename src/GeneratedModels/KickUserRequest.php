<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * KickUserRequest is the payload for kicking a user from a call. Optionally block the user as well.
 */
class KickUserRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,    // The user to kick 
        public ?bool $block = null,    // If true, also block the user from rejoining the call 
        public ?string $kickedByID = null,    // Server-side: ID of the user performing the action 
        public ?UserRequest $kickedBy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
