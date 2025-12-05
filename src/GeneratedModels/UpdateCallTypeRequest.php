<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * UpdateCallTypeRequest is the payload for updating a call type.
 *
 * @property string|null $externalStorage
 * @property array|null $grants
 * @property NotificationSettings|null $notificationSettings
 * @property CallSettingsRequest|null $settings
 */
class UpdateCallTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $externalStorage = null,
        public ?array $grants = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsRequest $settings = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
