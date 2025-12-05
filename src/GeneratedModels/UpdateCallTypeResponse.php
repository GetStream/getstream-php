<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * UpdateCallTypeResponse is the payload for updating a call type.
 *
 * @property \DateTime $createdAt
 * @property string $duration
 * @property string $name
 * @property \DateTime $updatedAt
 * @property array $grants
 * @property NotificationSettings $notificationSettings
 * @property CallSettingsResponse $settings
 * @property string|null $externalStorage
 */
class UpdateCallTypeResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // the time the call type was created
        public ?string $duration = null,
        public ?string $name = null, // the name of the call type
        public ?\DateTime $updatedAt = null, // the time the call type was last updated
        public ?array $grants = null, // the permissions granted to each role
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $externalStorage = null, // the external storage for the call type
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
