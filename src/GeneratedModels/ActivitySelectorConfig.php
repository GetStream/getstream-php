<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivitySelectorConfig extends BaseModel
{
    public function __construct(
        public ?\DateTime $cutoffTime = null,    // Time threshold for activity selection 
        public ?int $minPopularity = null,    // Minimum popularity threshold 
        public ?string $type = null,    // Type of selector 
        public ?array $sort = null,    // Sort parameters for activity selection 
        public ?object $filter = null,    // Filter for activity selection 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
