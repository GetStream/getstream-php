<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * UnpinRequest is the payload for unpinning a message.
 */
class UnpinRequest extends BaseModel
{
    public function __construct(
        public ?string $sessionID = null,    // the session ID of the user who pinned the message 
        public ?string $userID = null,    // the user ID of the user who pinned the message 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
