<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertModerationTemplateResponse extends BaseModel
{
    public function __construct(
        public ?FeedsModerationTemplateConfigPayload $config = null,
        public ?string $name = null, // Name of the moderation template
        public ?\DateTime $createdAt = null, // When the template was created
        public ?\DateTime $updatedAt = null, // When the template was last updated
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
