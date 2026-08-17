<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestSeedSpec extends BaseModel
{
    public function __construct(
        public ?array $labels = null, // Sample only records carrying any of these labels; empty samples everything
        public ?int $limit = null, // How many rows to sample, newest first; capped at 1000
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
