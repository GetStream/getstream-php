<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class FlagDetailsResponse extends BaseModel
{
    public function __construct(
        public ?string $originalText = null,
        public ?AutomodDetailsResponse $automod = null,
        public ?object $extra = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
