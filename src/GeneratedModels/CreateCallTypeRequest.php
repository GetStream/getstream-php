<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request for creating a call type
 *
 * @property string $name
 * @property string|null $externalStorage
 * @property array|null $grants
 * @property NotificationSettings|null $notificationSettings
 * @property CallSettingsRequest|null $settings
 */
class CreateCallTypeRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $externalStorage = null, // the external storage for the call type
        public ?array $grants = null, // the permissions granted to each role
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsRequest $settings = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
