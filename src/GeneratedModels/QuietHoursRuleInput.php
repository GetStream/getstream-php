<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * One recurring quiet window, expressed in local wall-clock time in the schedule's timezone.
 */
class QuietHoursRuleInput extends BaseModel
{
    public function __construct(
        public ?array $days = null, // The days of the week the window opens on, any of mon, tue, wed, thu, fri, sat, sun, each at most once. A window belongs to the day it opens: ["fri"] with 22:00 to 07:00 is quiet from Friday 22:00 until Saturday 07:00, and not on Saturday night. Empty or omitted means every day.
        public ?string $start = null, // When the window opens, as HH:MM local wall-clock time between 00:00 and 23:59. Must differ from end.
        public ?string $end = null, // When the window closes, as HH:MM local wall-clock time between 00:00 and 24:00. The end is exclusive: a window ending at 07:00 is already over at 07:00. An end earlier than start wraps past midnight into the next day (start 22:00, end 07:00). 24:00 means the end of the day, so start 00:00 with end 24:00 covers the whole day.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
