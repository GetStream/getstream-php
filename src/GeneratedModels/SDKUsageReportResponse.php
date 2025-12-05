<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<DailyAggregateSDKUsageReportResponse> $daily
 */
class SDKUsageReportResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyAggregateSDKUsageReportResponse>|null */
        #[ArrayOf(DailyAggregateSDKUsageReportResponse::class)]
        public ?array $daily = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
