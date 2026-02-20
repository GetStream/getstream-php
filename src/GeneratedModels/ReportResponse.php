<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ReportResponse extends BaseModel
{
    public function __construct(
        public ?ParticipantReportResponse $participants = null,
        public ?UserRatingReportResponse $userRatings = null,
        public ?CallReportResponse $call = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
