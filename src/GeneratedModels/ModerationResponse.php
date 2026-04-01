<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationResponse extends BaseModel
{
    public function __construct(
        public ?float $toxic = null,
        public ?float $explicit = null,
        public ?float $spam = null,
        public ?string $action = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
