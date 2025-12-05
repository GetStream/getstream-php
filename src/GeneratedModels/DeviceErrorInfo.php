<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $errorMessage
 * @property string $provider
 * @property string $providerName
 */
class DeviceErrorInfo extends BaseModel
{
    public function __construct(
        public ?string $errorMessage = null,
        public ?string $provider = null,
        public ?string $providerName = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
