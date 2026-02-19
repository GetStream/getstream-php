<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TranscriptionSettings extends BaseModel
{
    public function __construct(
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
        public ?TranslationSettings $translation = null,
        public ?string $mode = null,
        public ?string $closedCaptionMode = null, // One of: available, disabled, auto-on
        public ?string $language = null, // The language used in this call as a two letter code
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
