<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $closedCaptionMode
 * @property string|null $language
 * @property string|null $mode
 * @property SpeechSegmentConfig|null $speechSegmentConfig
 * @property TranslationSettings|null $translation
 */
class TranscriptionSettingsRequest extends BaseModel
{
    public function __construct(
        public ?string $closedCaptionMode = null,
        public ?string $language = null,
        public ?string $mode = null,
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
        public ?TranslationSettings $translation = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
