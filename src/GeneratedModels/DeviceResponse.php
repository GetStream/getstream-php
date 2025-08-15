<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for Device
 */
class DeviceResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $id = null,    // Device ID 
        public ?string $pushProvider = null,    // Push provider 
        public ?string $userID = null,    // User ID 
        public ?bool $disabled = null,    // Whether device is disabled or not 
        public ?string $disabledReason = null,    // Reason explaining why device had been disabled 
        public ?string $pushProviderName = null,    // Push provider name 
        public ?bool $voip = null,    // When true the token is for Apple VoIP push notifications 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
