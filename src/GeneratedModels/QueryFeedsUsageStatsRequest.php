<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $from
 * @property string|null $to
 */
class QueryFeedsUsageStatsRequest extends BaseModel
{
    public function __construct(
        public ?string $from = null, // Start date in YYYY-MM-DD format (optional, defaults to 30 days ago)
        public ?string $to = null, // End date in YYYY-MM-DD format (optional, defaults to today)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
