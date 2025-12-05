<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $bitrate
 * @property string $codec
 * @property int $frameRateLimit
 * @property int $maxDimension
 * @property int $minDimension
 */
class IngressVideoLayerResponse extends BaseModel
{
    public function __construct(
        public ?int $bitrate = null,
        public ?string $codec = null,
        public ?int $frameRateLimit = null,
        public ?int $maxDimension = null,
        public ?int $minDimension = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
