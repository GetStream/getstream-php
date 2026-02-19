<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AutomodRule extends BaseModel
{
    public function __construct(
        public ?string $label = null,
        public ?int $threshold = null,
        public ?string $action = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
