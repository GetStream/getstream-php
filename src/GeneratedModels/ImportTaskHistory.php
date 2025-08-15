<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ImportTaskHistory extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $nextState = null,
        public ?string $prevState = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
