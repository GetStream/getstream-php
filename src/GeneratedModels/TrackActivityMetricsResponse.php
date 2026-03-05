<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing results for each tracked metric event
 */
class TrackActivityMetricsResponse extends BaseModel
{
    public function __construct(
        /** @var array<TrackActivityMetricsEventResult>|null */
        #[ArrayOf(TrackActivityMetricsEventResult::class)]
        public ?array $results = null, // Results for each event in the request, in the same order
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
