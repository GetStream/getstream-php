<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property CallReportResponse $call
 * @property ParticipantReportResponse $participants
 * @property UserRatingReportResponse $userRatings
 */
class ReportResponse extends BaseModel
{
    public function __construct(
        public ?CallReportResponse $call = null,
        public ?ParticipantReportResponse $participants = null,
        public ?UserRatingReportResponse $userRatings = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
