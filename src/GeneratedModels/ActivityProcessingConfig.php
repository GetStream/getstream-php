<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityProcessingConfig extends BaseModel
{
    public function __construct(
        public ?array $allowedTags = null, // When set, the LLM activity processors may only write interest tags from this list. By default the model is not told about the list, so a tag is only written when the model happens to produce that exact word after lower-casing and trimming, which for any vocabulary is often not the case; set send_allowed_tags_to_ai to have the model choose from the list instead. Mutually exclusive with blocked_tags.
        public ?array $blockedTags = null, // Interest tags the LLM activity processors are never allowed to write. Mutually exclusive with allowed_tags.
        public ?bool $sendAllowedTagsToAi = null, // When true, this feed group's allowed_tags is given to the model as a constrained vocabulary so it maps its own wording onto a configured tag instead of that output being discarded. Improves how often a tag is produced, at the cost of sending the list on every request. Scoped to this group's own list: leaving it false keeps this group's tags out of the request even when another feed group on the same activity sets it true. Requires allowed_tags. Off by default.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
