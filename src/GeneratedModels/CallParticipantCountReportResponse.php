<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<DailyAggregateCallParticipantCountReportResponse> $daily
 */
class CallParticipantCountReportResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyAggregateCallParticipantCountReportResponse>|null */
        #[ArrayOf(DailyAggregateCallParticipantCountReportResponse::class)]
        public ?array $daily = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
