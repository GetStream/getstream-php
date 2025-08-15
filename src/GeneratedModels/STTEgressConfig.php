<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class STTEgressConfig extends BaseModel
{
    public function __construct(
        public ?bool $closedCaptionsEnabled = null,
        public ?string $language = null,
        public ?string $storageName = null,
        public ?bool $translationsEnabled = null,
        public ?bool $uploadTranscriptions = null,
        public ?string $whisperServerBaseUrl = null,
        public ?array $translationLanguages = null,
        public ?ExternalStorage $externalStorage = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
