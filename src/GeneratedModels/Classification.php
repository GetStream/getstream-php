<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Classification extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?float $confidence = null,
        public ?string $severity = null,
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $subclassifications = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
