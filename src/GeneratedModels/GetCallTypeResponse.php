<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
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
class GetCallTypeResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $duration = null,
        public ?string $name = null,
        public ?\DateTime $updatedAt = null,
        public ?array $grants = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $externalStorage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
