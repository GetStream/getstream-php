<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PoorTail extends BaseModel
{
    public function __construct(
        public ?int $healthyViewers = null,
        public ?float $healthyPct = null,
        public ?int $poorTotal = null,
        public ?PoorByCause $poorByCause = null,
        public ?Supporting $supporting = null,
        public ?string $note = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
