<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property SearchResultMessage|null $message
 */
class SearchResult extends BaseModel
{
    public function __construct(
        public ?SearchResultMessage $message = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
