<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class LabelsRequest extends BaseModel
{
    public function __construct(
        public ?string $content = null, // Content to moderate
        public ?string $contentType = null, // Type of content: 'text' (default), 'message', or 'username'. Stored as-sent; only 'username' routes to the username moderation API.
        public ?string $policy = null, // Optional moderation policy key (max 128 chars)
        public ?string $category = null, // Optional category for filtering (max 128 chars)
        public ?string $contentID = null, // Customer-supplied identifier for the moderated content, for tracing
        public ?string $userID = null, // Optional customer-supplied user identifier for the content author (max 256 chars). Enables filtering stored results by user_id.
        public ?bool $dryRun = null, // When true, run moderation and return labels without persisting the result. Useful for one-off checks (e.g. UI testers) that should not be recorded in the stored history.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
