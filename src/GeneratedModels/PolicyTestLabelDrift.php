<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestLabelDrift extends BaseModel
{
    public function __construct(
        public ?int $same = null,
        public ?int $changed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
