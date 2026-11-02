<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The push preference details.
 */
class PushPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $chatLevel = null, // The scope level of the push notifications.
        public ?ChatPreferencesResponse $chatPreferences = null,
        public ?string $callLevel = null,
        public ?string $feedsLevel = null,
        public ?FeedsPreferencesResponse $feedsPreferences = null,
        public ?\DateTime $disabledUntil = null, // If provided the notifications will be disabled until the set date.
        public ?PushScheduleResponse $schedule = null, // A recurring quiet-hours schedule: while any quiet window is active, push notifications for the user are suppressed. Suppressed notifications are dropped, not delayed.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
