<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressVideoLayerRequest extends BaseModel
{
    public function __construct(
        public ?string $codec = null, // The codec an ingress video layer is encoded with.
        public ?int $bitrate = null,
        public ?int $minDimension = null,
        public ?int $maxDimension = null,
        public ?int $frameRateLimit = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
