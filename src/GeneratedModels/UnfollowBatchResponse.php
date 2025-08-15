<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UnfollowBatchResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $follows = null,    // List of follow relationships that were removed 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
