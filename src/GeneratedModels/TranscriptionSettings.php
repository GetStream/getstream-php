<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $closedCaptionMode
 * @property string $language
 * @property string $mode
 * @property SpeechSegmentConfig|null $speechSegmentConfig
 * @property TranslationSettings|null $translation
 */
class TranscriptionSettings extends BaseModel
{
    public function __construct(
        public ?string $closedCaptionMode = null,
        public ?string $language = null, // The language used in this call as a two letter code
        public ?string $mode = null,
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
        public ?TranslationSettings $translation = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
