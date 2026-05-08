<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BypassRequest extends BaseModel
{
    public function __construct(
        public ?string $targetUserID = null, // ID of the user to update
        public ?bool $enabled = null, // Whether to enable moderation bypass for this user
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
