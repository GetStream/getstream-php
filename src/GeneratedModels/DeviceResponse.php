<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An object representing a device which can receive push notifications.
 */
class DeviceResponse extends BaseModel
{
    public function __construct(
        public ?string $pushProvider = null, // Push provider
        public ?string $pushProviderName = null, // Push provider name
        public ?string $id = null, // The device identifier.
        public ?\DateTime $createdAt = null, // The date when the device was created.
        public ?bool $disabled = null, // Whether device is disabled or not
        public ?string $disabledReason = null, // Reason explaining why device had been disabled
        public ?bool $voip = null, // When true the token is for Apple VoIP push notifications
        public ?string $hardwareID = null, // Stable physical device identifier used to deduplicate pushes across push providers
        public ?string $userID = null, // User ID
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
