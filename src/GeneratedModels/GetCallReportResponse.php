<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $duration
 * @property string $sessionID
 * @property ReportResponse $report
 * @property array<VideoReactionsResponse>|null $videoReactions
 * @property ChatActivityStatsResponse|null $chatActivity
 * @property CallSessionResponse|null $session
 */
class GetCallReportResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $sessionID = null,
        public ?ReportResponse $report = null,
        /** @var array<VideoReactionsResponse>|null */
        #[ArrayOf(VideoReactionsResponse::class)]
        public ?array $videoReactions = null,
        public ?ChatActivityStatsResponse $chatActivity = null,
        public ?CallSessionResponse $session = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
