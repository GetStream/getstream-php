<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A recurring quiet-hours schedule: while any quiet window is active, push notifications for the user are suppressed. Suppressed notifications are dropped, not delayed.
 */
class PushScheduleInput extends BaseModel
{
    public function __construct(
        public ?string $timezone = null, // IANA time zone name the quiet windows are evaluated in, for example Europe/Amsterdam or America/New_York. Daylight saving time is followed automatically for region-based names. Offsets such as +02:00 and the name "Local" are rejected; fixed-offset zones such as UTC or Etc/GMT-2 are accepted but never shift for daylight saving time. When updating an existing schedule, a non-empty timezone replaces the stored one and leaves the stored quiet_hours untouched.
        /** @var array<QuietHoursRuleInput>|null */
        #[ArrayOf(QuietHoursRuleInput::class)]
        public ?array $quietHours = null, // The quiet windows, 1 to 7 rules. Push is suppressed while any rule is active. When present it replaces all stored rules; omit it to keep them, for example to change only the timezone. An empty array counts as omitted, so it cannot be used to clear the rules: use remove_schedule for that.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
