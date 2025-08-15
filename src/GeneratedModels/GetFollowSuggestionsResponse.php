<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GetFollowSuggestionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $suggestions = null,    // List of suggested feeds to follow 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
