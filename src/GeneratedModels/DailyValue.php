<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Metric value for a specific date
 */
class DailyValue extends BaseModel
{
    public function __construct(
        public ?string $date = null, // Date in YYYY-MM-DD format
        public ?int $value = null, // Metric value for this date
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
