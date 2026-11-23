<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Filter for listing the marks on a message
 */
class QueryMessageMarksFilter extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Only marks of this type, for example played
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
