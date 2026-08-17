<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestTotals extends BaseModel
{
    public function __construct(
        public ?int $rows = null,
        public ?int $scored = null,
        public ?int $unscored = null,
        public ?int $passed = null,
        public ?int $failed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
