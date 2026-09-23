<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An interest tag to set on a user with its ranking weight
 */
class UserInterestRequest extends BaseModel
{
    public function __construct(
        public ?string $tag = null, // The interest tag; trimmed and lower-cased like activity interest_tags
        public ?float $weight = null, // Ranking weight between -1.0 (dislike) and 1.0 (like). Defaults to 1.0
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
