<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateUserPartialRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // User ID to update 
        public ?array $unset = null,
        public ?object $set = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
