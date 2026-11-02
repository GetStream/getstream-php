<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BlendArrangeConfig extends BaseModel
{
    public function __construct(
        public ?array $weights = null, // Relative weight per key value, greater than 0, at most 8 entries. Weights are normalized, so 80/20 equals 4/1. The key '*' is the catch-all source for key values without their own weight; unweighted values are otherwise placed after the blended section
        public ?array $minGap = null, // Minimum number of slots between two items of a source, per key value, 0 to 50. The key '*' requires weights['*']. Combinations of weights and gaps that cannot be satisfied are rejected
        public ?int $defaultMinGap = null, // Minimum gap, 0 to 50, for every source without a min_gap entry
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
