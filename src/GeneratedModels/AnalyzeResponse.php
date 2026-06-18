<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AnalyzeResponse extends BaseModel
{
    public function __construct(
        public ?string $status = null, // Always `complete` — /analyze is sync-only and the full verdict is in the response.
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
