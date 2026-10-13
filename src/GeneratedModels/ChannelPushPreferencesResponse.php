<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The push preference details.
 */
class ChannelPushPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $chatLevel = null, // The scope level of the push notifications.
        public ?ChatPreferencesResponse $chatPreferences = null,
        public ?\DateTime $disabledUntil = null, // If provided the notifications will be disabled until the set date.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
