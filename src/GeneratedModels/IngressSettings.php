<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressSettings extends BaseModel
{
    public function __construct(
        public ?IngressAudioEncodingOptions $audioEncodingOptions = null,
        public ?bool $enabled = null,
        /** @var array<string, IngressVideoEncodingOptions>|null */
        #[MapOf(IngressVideoEncodingOptions::class)]
        public ?array $videoEncodingOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
