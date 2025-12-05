<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $disabled
 * @property \DateTime|null $disabledUntil
 */
class PushNotificationSettingsResponse extends BaseModel
{
    public function __construct(
        public ?bool $disabled = null,
        public ?\DateTime $disabledUntil = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
