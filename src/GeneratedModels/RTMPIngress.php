<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * RTMP input settings
 *
 * @property string $address
 */
class RTMPIngress extends BaseModel
{
    public function __construct(
        public ?string $address = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
