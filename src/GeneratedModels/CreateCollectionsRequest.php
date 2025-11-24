<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CreateCollectionsRequest extends BaseModel
{
    public function __construct(
        public ?array $collections = null,    // List of collections to create 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
