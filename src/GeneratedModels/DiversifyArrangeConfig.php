<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DiversifyArrangeConfig extends BaseModel
{
    public function __construct(
        public ?string $strategy = null, // Diversify strategy: 'cap' (default) or 'decay'
        public ?int $max = null, // Cap strategy: the most items of one key value allowed in any window of consecutive slots. At least 1
        public ?int $window = null, // Cap strategy: window size in slots, greater than max and at most 100. Defaults to max + 1
        public ?float $decay = null, // Decay strategy: per-repeat score multiplier, greater than 0 and less than 1. Defaults to 0.5
        public ?float $floor = null, // Decay strategy: the lowest multiplier a repeated key can reach, at least 0 and less than 1. Defaults to 0.25
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
