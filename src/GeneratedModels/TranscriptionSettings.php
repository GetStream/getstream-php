<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TranscriptionSettings extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $closedCaptionMode = null, // One of: available, disabled, auto-on
        public ?string $language = null, // The language used in this call as a two letter code
        public ?TranslationSettings $translation = null,
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
