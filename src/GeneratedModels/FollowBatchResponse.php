<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FollowBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $follows = null,    // List of created follow relationships 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
