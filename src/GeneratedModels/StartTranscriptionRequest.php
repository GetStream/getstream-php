<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $enableClosedCaptions
 * @property string|null $language
 * @property string|null $transcriptionExternalStorage
 */
class StartTranscriptionRequest extends BaseModel
{
    public function __construct(
        public ?bool $enableClosedCaptions = null, // Enable closed captions along with transcriptions
        public ?string $language = null, // The spoken language in the call, if not provided the language defined in the transcription settings will be used
        public ?string $transcriptionExternalStorage = null, // Store transcriptions in this external storage
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
