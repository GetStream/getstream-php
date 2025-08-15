<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateThreadPartialRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $unset = null,    // Array of field names to unset 
        public ?object $set = null,    // Sets new field values 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
