<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressSettingsRequest extends BaseModel
{
    public function __construct(
        public ?IngressAudioEncodingOptionsRequest $audioEncodingOptions = null,
        public ?bool $enabled = null,
        /** @var array<string, IngressVideoEncodingOptionsRequest>|null */
        #[MapOf(IngressVideoEncodingOptionsRequest::class)]
        public ?array $videoEncodingOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
