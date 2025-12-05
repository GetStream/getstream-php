<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $enabled
 * @property IngressAudioEncodingOptions|null $audioEncodingOptions
 * @property array|null $videoEncodingOptions
 */
class IngressSettings extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?IngressAudioEncodingOptions $audioEncodingOptions = null,
        public ?array $videoEncodingOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
