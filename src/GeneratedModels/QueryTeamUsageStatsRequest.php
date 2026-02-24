<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request payload for querying team-level usage statistics from the warehouse database
 */
class QueryTeamUsageStatsRequest extends BaseModel
{
    public function __construct(
        public ?string $month = null, // Month in YYYY-MM format (e.g., '2026-01'). Mutually exclusive with start_date/end_date. Returns aggregated monthly values.
        public ?string $startDate = null, // Start date in YYYY-MM-DD format. Used with end_date for custom date range. Returns daily breakdown.
        public ?string $endDate = null, // End date in YYYY-MM-DD format. Used with start_date for custom date range. Returns daily breakdown.
        public ?int $limit = null, // Maximum number of teams to return per page (default: 30, max: 30)
        public ?string $next = null, // Cursor for pagination to fetch next page of teams
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
