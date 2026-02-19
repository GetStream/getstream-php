<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressVideoLayer extends BaseModel
{
    public function __construct(
        public ?string $codec = null,
        public ?int $bitrate = null,
        public ?int $frameRate = null,
        public ?int $minDimension = null,
        public ?int $maxDimension = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
