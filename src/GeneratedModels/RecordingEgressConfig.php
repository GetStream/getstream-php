<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RecordingEgressConfig extends BaseModel
{
    public function __construct(
        public ?bool $audioOnly = null,
        public ?string $storageName = null,
        public ?CompositeAppSettings $compositeAppSettings = null,
        public ?ExternalStorage $externalStorage = null,
        public ?Quality $quality = null,
        public ?VideoOrientation $videoOrientationHint = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
