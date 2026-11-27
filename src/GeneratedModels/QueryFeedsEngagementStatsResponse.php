<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedsEngagementStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<EngagementStatsResult>|null */
        #[ArrayOf(EngagementStatsResult::class)]
        public ?array $results = null, // One series per (group, view, experiment), in byte order of experiment, view, then group
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
