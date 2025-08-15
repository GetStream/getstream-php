<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateActivityPartialRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $unset = null,    // List of dot-notation paths to remove 
        public ?object $set = null,    // Map of dot-notation field paths to new values 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
