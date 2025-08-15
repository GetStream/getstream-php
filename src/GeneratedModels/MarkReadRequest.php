<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MarkReadRequest extends BaseModel
{
    public function __construct(
        public ?string $messageID = null,    // ID of the message that is considered last read by client 
        public ?string $threadID = null,    // Optional Thread ID to specifically mark a given thread as read 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
