<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Coverage extends BaseModel
{
    public function __construct(
        public ?MetricsPct $metricsPct = null,
        public ?int $publisherEncodingProfiles = null,
        /** @var array<AbsentMetric>|null */
        #[ArrayOf(AbsentMetric::class)]
        public ?array $absent = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
