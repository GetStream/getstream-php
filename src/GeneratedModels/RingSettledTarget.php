<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RingSettledTarget extends BaseModel
{
    public function __construct(
        public ?string $state = null,
        public ?\DateTime $stateAt = null,
        public ?string $reason = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
