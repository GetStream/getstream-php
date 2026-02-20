<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * UpdateCallTypeRequest is the payload for updating a call type.
 */
class UpdateCallTypeRequest extends BaseModel
{
    public function __construct(
        public ?array $grants = null,
        public ?NotificationSettingsRequest $notificationSettings = null,
        public ?CallSettingsRequest $settings = null,
        public ?string $externalStorage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
