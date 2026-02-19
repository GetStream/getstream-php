<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationResponse extends BaseModel
{
    public function __construct(
        public ?int $toxic = null,
        public ?int $explicit = null,
        public ?int $spam = null,
        public ?string $action = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
