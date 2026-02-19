<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FlagDetailsResponse extends BaseModel
{
    public function __construct(
        public ?AutomodDetailsResponse $automod = null,
        public ?object $extra = null,
        public ?string $originalText = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
