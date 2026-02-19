<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertModerationTemplateRequest extends BaseModel
{
    public function __construct(
        public ?FeedsModerationTemplateConfigPayload $config = null,
        public ?string $name = null, // Name of the moderation template
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
