<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Configuration for PIN protection settings
 */
class SIPPinProtectionConfigsRequest extends BaseModel
{
    public function __construct(
        public ?string $defaultPin = null,    // Default PIN to use if there is no PIN set on the call object 
        public ?bool $enabled = null,    // Whether PIN protection is enabled 
        public ?int $maxAttempts = null,    // Maximum number of PIN attempts allowed 
        public ?int $requiredPinDigits = null,    // Number of digits required for the PIN 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
