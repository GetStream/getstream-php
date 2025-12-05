<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $duration
 * @property string $name
 * @property \DateTime $updatedAt
 * @property FeedsModerationTemplateConfig|null $config
 */
class UpsertModerationTemplateResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // When the template was created
        public ?string $duration = null,
        public ?string $name = null, // Name of the moderation template
        public ?\DateTime $updatedAt = null, // When the template was last updated
        public ?FeedsModerationTemplateConfig $config = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
