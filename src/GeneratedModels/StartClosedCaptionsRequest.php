<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class StartClosedCaptionsRequest extends BaseModel
{
    public function __construct(
        public ?bool $enableTranscription = null, // Enable transcriptions along with closed captions
        public ?string $externalStorage = null, // Which external storage to use for transcriptions (only applicable if enable_transcription is true)
        public ?string $language = null, // The spoken language in the call, if not provided the language defined in the transcription settings will be used. One of: auto, ar, bg, ca, cs, da, de, el, en, es, et, fi, fr, he, hi, hr, hu, id, it, ja, ko, ms, nl, no, pl, pt, ro, ru, sk, sl, sv, ta, th, tl, tr, uk, zh
        public ?SpeechSegmentConfig $speechSegmentConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
