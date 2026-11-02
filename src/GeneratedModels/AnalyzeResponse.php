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
        public ?string $llmModel = null, // ID of the LLM model that scored the content (e.g. gpt-4o-mini). Omitted when no LLM verdict was used (e.g. Bodyguard-only, or `pending`).
        public ?string $llmReasoningEffort = null, // reasoning_effort sent with the LLM request. Omitted when the request did not send one.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
