<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PlatformDataResponse extends BaseModel
{
    public function __construct(
        public ?ClientOSDataResponse $os = null,
        public ?DeviceDataResponse $device = null,
        public ?BrowserDataResponse $browser = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
