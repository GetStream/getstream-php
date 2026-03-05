<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallTypeResponse is the payload for a call type.
 */
class CallTypeResponse extends BaseModel
{
    public function __construct(
        public ?string $name = null, // the name of the call type
        public ?array $grants = null, // the permissions granted to each role
        public ?CallSettingsResponse $settings = null,
        public ?NotificationSettingsResponse $notificationSettings = null,
        public ?\DateTime $createdAt = null, // the time the call type was created
        public ?\DateTime $updatedAt = null, // the time the call type was last updated
        public ?string $externalStorage = null, // the external storage for the call type
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
