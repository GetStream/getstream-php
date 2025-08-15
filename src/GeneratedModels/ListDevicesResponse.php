<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * List devices response
 */
class ListDevicesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $devices = null,    // List of devices 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
