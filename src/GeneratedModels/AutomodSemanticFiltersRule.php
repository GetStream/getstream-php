<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AutomodSemanticFiltersRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $name = null,
        public ?int $threshold = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
