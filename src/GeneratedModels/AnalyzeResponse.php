<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AnalyzeResponse extends BaseModel
{
    public function __construct(
        public ?string $status = null, // `complete` (all fields screened), `partial` (mix of verdicts and per-field errors), or `pending` (async).
        /** @var array<string, AnalyzeTextField>|null */
        #[MapOf(AnalyzeTextField::class)]
        public ?array $texts = null, // Per-text-field moderation verdicts keyed by caller label.
        /** @var array<string, AnalyzeImageField>|null */
        #[MapOf(AnalyzeImageField::class)]
        public ?array $images = null, // Per-image moderation verdicts keyed by caller label.
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
