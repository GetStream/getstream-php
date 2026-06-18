<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AnalyzeImageField extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Echo of `content_ids[label]` when supplied on the request; omitted otherwise.
        public ?string $action = null, // Per-image action: keep | flag | remove.
        public ?float $confidence = null, // Highest confidence (0–1) across detected classifications + sub-classifications. Convenience aggregate over the nested values in `classifications`.
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $classifications = null, // Hierarchical list of L1 (parent) classifications. Each entry: `name`, `confidence` (0–1), and nested `subclassifications` (L2 leaves with their own confidence). Resolved against the app's effective taxonomy (custom taxonomy when configured, otherwise the standard Bodyguard catalogue).
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $ocrClassifications = null, // Flat list of Bodyguard OCR text-moderation labels on the image's extracted text (e.g. VULGARITY, PII). Each entry: `name` + `severity`. Populated when BG's OCR pipeline returned non-empty results for this image.
        public ?string $error = null, // Set when moderation couldn't be determined for this image — action is absent.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
