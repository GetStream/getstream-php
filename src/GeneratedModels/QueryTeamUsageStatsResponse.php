<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response containing team-level usage statistics
 */
class QueryTeamUsageStatsResponse extends BaseModel
{
    public function __construct(
        /** @var array<TeamUsageStats>|null */
        #[ArrayOf(TeamUsageStats::class)]
        public ?array $teams = null, // Array of team usage statistics
        public ?string $next = null, // Cursor for pagination to fetch next page
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
