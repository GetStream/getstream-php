<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AudioSettings extends BaseModel
{
    public function __construct(
        public ?bool $accessRequestEnabled = null,
        public ?string $defaultDevice = null,
        public ?bool $micDefaultOn = null,
        public ?bool $opusDtxEnabled = null,
        public ?bool $redundantCodingEnabled = null,
        public ?bool $speakerDefaultOn = null,
        public ?NoiseCancellationSettings $noiseCancellation = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
