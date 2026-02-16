<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * List devices response
 */
class ListDevicesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<DeviceResponse>|null */
        #[ArrayOf(DeviceResponse::class)]
        public ?array $devices = null, // List of devices
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
