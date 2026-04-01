<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AutomodSemanticFiltersRule extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?float $threshold = null,
        public ?string $action = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
