<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RTMPEgressConfig extends BaseModel
{
    public function __construct(
        public ?string $rtmpLocation = null,
        public ?CompositeAppSettings $compositeAppSettings = null,
        public ?Quality $quality = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
