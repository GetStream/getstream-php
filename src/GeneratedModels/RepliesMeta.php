<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Cursor & depth information for a comment's direct replies. Mirrors Reddit's 'load more replies' semantics.
 */
class RepliesMeta extends BaseModel
{
    public function __construct(
        public ?bool $depthTruncated = null,    // True if the subtree was cut because the requested depth was reached. 
        public ?bool $hasMore = null,    // True if more siblings exist in the database. 
        public ?int $remaining = null,    // Number of unread siblings that match current filters. 
        public ?string $nextCursor = null,    // Opaque cursor to request the next page of siblings. 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
