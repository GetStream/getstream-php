<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class OwnCapabilitiesBatchRequest extends BaseModel
{
    public function __construct(
        public ?array $feeds = null,    // List of feed IDs to get capabilities for 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
