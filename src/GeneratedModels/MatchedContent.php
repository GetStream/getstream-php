<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MatchedContent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Content type that contributed this entry: `image` or `text`.
        public ?string $id = null, // The `content_ids[label]` value supplied on the `/analyze` request that contributed this entry.
        public ?string $text = null,
        public ?\DateTime $publishedAt = null, // `content_published_at` from the contributing `/analyze` request, or server receive time when that field was omitted.
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $classifications = null, // Image-classification entries (keyframe rule, Type=image) carry nested L1 → L2 classifications. Text entries (closed_caption rule, Type=text) carry flat label + severity. Resolved against the app's effective taxonomy on the image side.
        public ?float $confidence = null, // Image-classification entries only. Aggregate (max) confidence score across the entry's classifications + sub-classifications. Absent on text and OCR entries.
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $ocrClassifications = null, // OCR entries only (keyframe_ocr rule, Type=image). Bodyguard labels that fired against the keyframe's OCR-extracted text (e.g. `INSULT`, `HATE_SPEECH`). Distinct from `classifications` so consumers can route OCR matches separately from image-classification matches.
        public ?string $severity = null, // Text and OCR entries. Aggregate (max) Bodyguard severity level (`LOW` / `MEDIUM` / `HIGH` / `CRITICAL`). Absent on image-classification entries.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
