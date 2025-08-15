<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryBookmarkFoldersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?array $bookmarkFolders = null,    // List of bookmark folders matching the query 
        public ?string $next = null,    // Cursor for next page 
        public ?string $prev = null,    // Cursor for previous page 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
