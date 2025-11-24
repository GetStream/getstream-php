<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ParticipantSeriesSubscriberStats extends BaseModel
{
    public function __construct(
        public ?array $globalMetricsOrder = null,
        public ?array $subscriptions = null,
        public ?array $global = null,
        public ?array $globalMeta = null,
        public ?array $globalThresholds = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
