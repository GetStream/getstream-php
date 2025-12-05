<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $defaultDevice
 * @property bool|null $accessRequestEnabled
 * @property bool|null $hifiAudioEnabled
 * @property bool|null $micDefaultOn
 * @property bool|null $opusDtxEnabled
 * @property bool|null $redundantCodingEnabled
 * @property bool|null $speakerDefaultOn
 * @property NoiseCancellationSettings|null $noiseCancellation
 */
class AudioSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $defaultDevice = null,
        public ?bool $accessRequestEnabled = null,
        public ?bool $hifiAudioEnabled = null,
        public ?bool $micDefaultOn = null,
        public ?bool $opusDtxEnabled = null,
        public ?bool $redundantCodingEnabled = null,
        public ?bool $speakerDefaultOn = null,
        public ?NoiseCancellationSettings $noiseCancellation = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
