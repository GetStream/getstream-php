<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $label
 * @property string|null $description
 * @property string|null $unit
 */
class MetricDescriptor extends BaseModel
{
    public function __construct(
        public ?string $label = null,
        public ?string $description = null,
        public ?string $unit = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
