<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MetricThreshold extends BaseModel
{
    public function __construct(
        public ?string $level = null,
        public ?string $operator = null,
        public ?int $value = null,
        public ?string $valueUnit = null,
        public ?int $windowSeconds = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
