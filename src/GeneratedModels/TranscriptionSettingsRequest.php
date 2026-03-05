<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class TranscriptionSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?string $closedCaptionMode = null,
        public ?string $language = null,
        public ?TranslationSettings $translation = null,
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
