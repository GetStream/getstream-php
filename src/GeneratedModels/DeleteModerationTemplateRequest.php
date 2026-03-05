<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteModerationTemplateRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Name of the moderation template to delete
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
