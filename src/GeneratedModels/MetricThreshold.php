<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $level
 * @property string $operator
 * @property int $value
 * @property string|null $valueUnit
 * @property int|null $windowSeconds
 */
class MetricThreshold extends BaseModel
{
    public function __construct(
        public ?string $level = null,
        public ?string $operator = null,
        public ?int $value = null,
        public ?string $valueUnit = null,
        public ?int $windowSeconds = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
