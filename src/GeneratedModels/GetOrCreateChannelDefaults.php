<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Defaults applied by the get-or-create channel endpoint.
 */
class GetOrCreateChannelDefaults extends BaseModel
{
    public function __construct(
        public ?PagerDefaults $messages = null, // Resolved defaults for a nested pagination object.
        public ?PagerDefaults $members = null, // Resolved defaults for a nested pagination object.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
