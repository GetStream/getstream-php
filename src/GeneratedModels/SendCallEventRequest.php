<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Send a call event to the other user
 */
class SendCallEventRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?UserRequest $user = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
