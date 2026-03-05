<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeviceErrorInfo extends BaseModel
{
    public function __construct(
        public ?string $provider = null,
        public ?string $providerName = null,
        public ?string $errorMessage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
