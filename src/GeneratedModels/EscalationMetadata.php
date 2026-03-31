<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EscalationMetadata extends BaseModel
{
    public function __construct(
        public ?string $reason = null,
        public ?string $notes = null,
        public ?string $priority = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
