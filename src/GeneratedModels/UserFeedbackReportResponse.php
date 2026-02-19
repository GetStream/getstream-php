<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserFeedbackReportResponse extends BaseModel
{
    public function __construct(
        /** @var array<DailyAggregateUserFeedbackReportResponse>|null */
        #[ArrayOf(DailyAggregateUserFeedbackReportResponse::class)]
        public ?array $daily = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
