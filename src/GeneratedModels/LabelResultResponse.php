<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LabelResultResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier
        public ?\DateTime $createdAt = null, // Timestamp
        public ?string $policy = null,
        public ?string $contentType = null,
        public ?string $content = null, // The moderated content
        public ?string $maskedContent = null, // Content with blocklisted tokens masked (when a blocklist rule with action=mask rewrote the original)
        public ?string $language = null, // Detected language
        public ?string $category = null, // Category
        public ?array $labels = null, // Moderation labels
        public ?string $harmType = null, // High-level harm category
        public ?string $directedAt = null, // Who the content is directed at (USER, GROUP, EVERYONE, NONE, etc.)
        public ?string $recommendedAction = null, // Provider recommended action
        public ?string $severity = null, // Severity level
        public ?string $contentID = null, // Customer-supplied identifier for the moderated content
        public ?string $userID = null, // Customer-supplied user identifier for the content author
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
