<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FlagDetails extends BaseModel
{
    public function __construct(
        public ?string $originalText = null,
        public ?object $extra = null,
        public ?AutomodDetails $automod = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
