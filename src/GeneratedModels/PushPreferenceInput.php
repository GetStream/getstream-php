<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $callLevel
 * @property string|null $channelCid
 * @property string|null $chatLevel
 * @property \DateTime|null $disabledUntil
 * @property string|null $feedsLevel
 * @property bool|null $removeDisable
 * @property string|null $userID
 * @property FeedsPreferences|null $feedsPreferences
 */
class PushPreferenceInput extends BaseModel
{
    public function __construct(
        public ?string $callLevel = null, // Set the level of call push notifications for the user. One of all, none, default
        public ?string $channelCid = null, // Set the push preferences for a specific channel. If empty it sets the default for the user
        public ?string $chatLevel = null, // Set the level of chat push notifications for the user. One of all, mentions, none, default
        public ?\DateTime $disabledUntil = null, // Disable push notifications till a certain time
        public ?string $feedsLevel = null, // Set the level of feeds push notifications for the user. One of all, none, default
        public ?bool $removeDisable = null, // Remove the disabled until time. (IE stop snoozing notifications)
        public ?string $userID = null, // The user id for which to set the push preferences. Required when using server side auths, defaults to current user with client side auth.
        public ?FeedsPreferences $feedsPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
