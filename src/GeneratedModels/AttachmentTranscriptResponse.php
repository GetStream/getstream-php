<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AttachmentTranscriptResponse extends BaseModel
{
    public function __construct(
        public ?string $text = null, // Transcribed text of the recording
        /** @var array<TranscriptLanguageResponse>|null */
        #[ArrayOf(TranscriptLanguageResponse::class)]
        public ?array $languages = null, // Languages detected in the recording
        public ?string $error = null, // Why the recording could not be transcribed: unsupported_format, too_large, blocked_url, fetch_failed or invalid_response
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
