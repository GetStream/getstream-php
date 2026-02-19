<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AudioSettingsRequest extends BaseModel
{
    public function __construct(
        public ?NoiseCancellationSettings $noiseCancellation = null,
        public ?bool $accessRequestEnabled = null,
        public ?bool $opusDtxEnabled = null,
        public ?bool $redundantCodingEnabled = null,
        public ?bool $micDefaultOn = null,
        public ?bool $speakerDefaultOn = null,
        public ?string $defaultDevice = null,
        public ?bool $hifiAudioEnabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
