<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UserRatingReportResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null,
        public ?int $average = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
