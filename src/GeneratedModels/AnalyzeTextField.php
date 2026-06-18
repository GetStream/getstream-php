<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AnalyzeTextField extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Echo of `content_ids[label]` when supplied on the request; omitted otherwise.
        public ?string $action = null, // Per-field action: keep | flag | remove.
        /** @var array<Classification>|null */
        #[ArrayOf(Classification::class)]
        public ?array $classifications = null, // Flat list of detected Bodyguard text labels (e.g. INSULT, VULGARITY). Each entry carries `name` and `severity`.
        public ?string $severity = null, // Aggregate severity across the field: LOW | MEDIUM | HIGH | CRITICAL.
        public ?string $language = null, // Detected language code.
        public ?string $error = null, // Set when moderation couldn't be determined for this field — action is absent.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
