<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property \DateTime|null $cutoffTime
 * @property string|null $cutoffWindow
 * @property int|null $minPopularity
 * @property array<SortParamRequest>|null $sort
 * @property object|null $filter
 * @property object|null $params
 */
class ActivitySelectorConfigResponse extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of selector
        public ?\DateTime $cutoffTime = null, // Time threshold for activity selection (timestamp)
        public ?string $cutoffWindow = null, // Flexible relative time window for activity selection (e.g., '1h', '3d', '1y')
        public ?int $minPopularity = null, // Minimum popularity threshold
        /** @var array<SortParamRequest>|null Sort parameters for activity selection */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort parameters for activity selection
        public ?object $filter = null, // Filter for activity selection
        public ?object $params = null, // Generic params for selector-specific configuration
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
