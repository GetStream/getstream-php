<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * MuteUsersResponse is the response payload for the mute users endpoint.
 */
class MuteUsersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,    // Duration of the request in milliseconds 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
