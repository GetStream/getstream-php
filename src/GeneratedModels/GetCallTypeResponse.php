<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCallTypeResponse extends BaseModel
{
    public function __construct(
        public ?NotificationSettingsResponse $notificationSettings = null,
        public ?CallSettingsResponse $settings = null,
        public ?string $name = null,
        public ?array $grants = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $externalStorage = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
