<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityProcessingConfig extends BaseModel
{
    public function __construct(
        public ?array $allowedTags = null, // When set, the LLM activity processors may only write interest tags from this list. Tags are matched literally after lower-casing and trimming, so a generic vocabulary matches more often than in-house terms. Mutually exclusive with blocked_tags.
        public ?array $blockedTags = null, // Interest tags the LLM activity processors are never allowed to write. Mutually exclusive with allowed_tags.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
