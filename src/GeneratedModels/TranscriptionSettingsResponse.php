<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TranscriptionSettingsResponse extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // Whether a call feature is available, disabled, or turned on automatically.
        public ?string $closedCaptionMode = null, // Whether a call feature is available, disabled, or turned on automatically.
        public ?string $language = null, // Language a call is transcribed or captioned in.
        public ?TranslationSettings $translation = null,
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
