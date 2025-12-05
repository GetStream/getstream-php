<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<DailyAggregateQualityScoreReportResponse> $daily
 */
class QualityScoreReportResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyAggregateQualityScoreReportResponse>|null */
        #[ArrayOf(DailyAggregateQualityScoreReportResponse::class)]
        public ?array $daily = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
