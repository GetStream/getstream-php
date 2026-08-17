<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Incident extends BaseModel
{
    public function __construct(
        public ?string $from = null,
        public ?string $to = null,
        public ?int $viewersInterrupted = null,
        public ?int $peakConcurrency = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
