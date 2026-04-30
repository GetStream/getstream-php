<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LabelsResponse extends BaseModel
{
    public function __construct(
        public ?string $contentID = null, // Customer-supplied identifier for the moderated content, for tracing
        public ?array $labels = null, // Moderation labels detected
        public ?string $harmType = null, // High-level harm category
        public ?string $directedAt = null, // Who the content is directed at (USER, GROUP, EVERYONE, NONE, etc.), when the provider exposes it
        public ?string $recommendedAction = null, // Provider recommended action
        public ?string $severity = null, // Severity level
        public ?string $language = null, // Detected language
        public ?string $maskedContent = null, // Content with blocklisted tokens masked or substituted. Present only when a blocklist rewrote the original content.
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
