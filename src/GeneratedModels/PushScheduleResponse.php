<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A recurring quiet-hours schedule: while any quiet window is active, push notifications for the user are suppressed. Suppressed notifications are dropped, not delayed.
 */
class PushScheduleResponse extends BaseModel
{
    public function __construct(
        public ?string $timezone = null, // IANA time zone name the quiet windows are evaluated in, for example Europe/Amsterdam.
        /** @var array<QuietHoursRuleResponse>|null */
        #[ArrayOf(QuietHoursRuleResponse::class)]
        public ?array $quietHours = null, // The quiet windows. Push is suppressed while any rule is active.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
