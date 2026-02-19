<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request for creating a call type
 */
class CreateCallTypeRequest extends BaseModel
{
    public function __construct(
        public ?NotificationSettingsRequest $notificationSettings = null,
        public ?CallSettingsRequest $settings = null,
        public ?string $name = null,
        public ?array $grants = null, // the permissions granted to each role
        public ?string $externalStorage = null, // the external storage for the call type
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
