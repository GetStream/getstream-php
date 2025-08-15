<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdatePollOptionRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Option ID 
        public ?string $text = null,    // Option text 
        public ?string $userID = null,
        public ?object $custom = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
