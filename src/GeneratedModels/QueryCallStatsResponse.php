<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $duration
 * @property array<CallStatsReportSummaryResponse> $reports
 * @property string|null $next
 * @property string|null $prev
 */
class QueryCallStatsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<CallStatsReportSummaryResponse>|null */
        #[ArrayOf(CallStatsReportSummaryResponse::class)]
        public ?array $reports = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
