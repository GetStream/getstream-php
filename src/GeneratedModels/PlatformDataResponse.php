<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property BrowserDataResponse $browser
 * @property DeviceDataResponse $device
 * @property ClientOSDataResponse $os
 */
class PlatformDataResponse extends BaseModel
{
    public function __construct(
        public ?BrowserDataResponse $browser = null,
        public ?DeviceDataResponse $device = null,
        public ?ClientOSDataResponse $os = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
