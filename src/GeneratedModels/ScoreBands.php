<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ScoreBands extends BaseModel
{
    public function __construct(
        public ?float $good = null,
        public ?float $ok = null,
        public ?float $poor = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
