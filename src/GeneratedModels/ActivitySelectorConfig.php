<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivitySelectorConfig extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of selector. One of: popular, proximity, following, current_feed, query, interest, follow_suggestion
        public ?object $filter = null, // Filter for activity selection
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Sort parameters for activity selection
        public ?string $cutoffTime = null, // Time threshold for activity selection (string). Expected RFC3339 format (e.g., 2006-01-02T15:04:05Z07:00). Cannot be used together with cutoff_window
        public ?string $cutoffWindow = null, // Flexible relative time window for activity selection (e.g., '1h', '3d', '1y'). Activities older than this duration will be filtered out. Cannot be used together with cutoff_time
        public ?int $minPopularity = null, // Minimum popularity threshold. For the 'popular' selector, omit to use the default (5); values below 1 are rejected
        public ?FeedGroupScope $feedGroups = null,
        public ?int $rankingCandidateLimit = null, // Maximum number of candidate activities this selector contributes to a ranked feed (1-1000). Omit to use the default ranking buffer. Only supported on the popular, proximity, interest and query selectors, and ignored on feeds without ranking
        public ?int $timeBudgetMs = null, // Maximum time in milliseconds this selector may take (25-5000). A selector that runs over its budget is dropped from that read instead of failing it, and stays out for the rest of that pagination session. The budget can only tighten the default, never extend it. Omit to use the default. Only supported on the popular, proximity, interest, query and follow_suggestion selectors
        public ?object $params = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
