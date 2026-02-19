<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IngressSettingsResponse extends BaseModel
{
    public function __construct(
        public ?IngressAudioEncodingResponse $audioEncodingOptions = null,
        public ?bool $enabled = null,
        /** @var array<string, IngressVideoEncodingResponse>|null */
        #[MapOf(IngressVideoEncodingResponse::class)]
        public ?array $videoEncodingOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
