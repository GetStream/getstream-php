<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SourceInterruption extends BaseModel
{
    public function __construct(
        public ?string $kind = null,
        public ?bool $seamless = null,
        public ?float $atOffsetMin = null,
        public ?int $deadAirS = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
