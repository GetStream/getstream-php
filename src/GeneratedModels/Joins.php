<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Joins extends BaseModel
{
    public function __construct(
        public ?int $joinAttempts = null,
        public ?float $joinSuccessRate = null,
        public ?array $failureStages = null,
        public ?array $disconnectReasons = null,
        public ?string $reason = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
