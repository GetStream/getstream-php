<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestRow extends BaseModel
{
    public function __construct(
        public ?string $text = null,
        public ?array $labels = null,
        public ?string $recommendedAction = null,
        public ?string $policy = null,
        public ?string $contentType = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
