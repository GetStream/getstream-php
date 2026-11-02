<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PushPreferenceInput extends BaseModel
{
    public function __construct(
        public ?string $userID = null, // The user id for which to set the push preferences. Required when using server side auths, defaults to current user with client side auth.
        public ?string $channelCid = null, // Set the push preferences for a specific channel. If empty it sets the default for the user
        public ?string $chatLevel = null, // Set the level of chat push notifications for the user. Note: "mentions" is deprecated in favor of "direct_mentions". One of: all, mentions, direct_mentions, all_mentions, none, default
        public ?ChatPreferencesInput $chatPreferences = null,
        public ?string $callLevel = null, // Set the level of call push notifications for the user. One of: all, none, default
        public ?string $feedsLevel = null, // Set the level of feeds push notifications for the user. One of: all, none, default
        public ?FeedsPreferences $feedsPreferences = null,
        public ?\DateTime $disabledUntil = null, // Disable push notifications till a certain time
        public ?bool $removeDisable = null, // Remove the disabled until time. (IE stop snoozing notifications)
        public ?PushScheduleInput $schedule = null, // A recurring quiet-hours schedule: while any quiet window is active, push notifications for the user are suppressed. Suppressed notifications are dropped, not delayed.
        public ?bool $removeSchedule = null, // Remove the user's quiet-hours schedule, the counterpart of remove_disable. It is applied before schedule, so sending both in one item replaces the stored schedule instead of merging into it. Cannot be combined with channel_cid. To switch from a schedule to a snooze, send remove_schedule together with disabled_until.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
