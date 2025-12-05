<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $name
 * @property FeedsModerationTemplateConfig $config
 */
class UpsertModerationTemplateRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the moderation template
        public ?FeedsModerationTemplateConfig $config = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
