<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryFeedModerationTemplate extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the moderation template
        public ?FeedsModerationTemplateConfigPayload $config = null,
        public ?\DateTime $createdAt = null, // When the template was created
        public ?\DateTime $updatedAt = null, // When the template was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
