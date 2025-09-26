<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VelocityFilterConfig extends BaseModel
{
    public function __construct(
        public ?bool $advancedFilters = null,
        public ?bool $async = null,
        public ?bool $cascadingActions = null,
        public ?int $cidsPerUser = null,
        public ?bool $enabled = null,
        public ?bool $firstMessageOnly = null,
        public ?array $rules = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
