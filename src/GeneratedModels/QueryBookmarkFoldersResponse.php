<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<BookmarkFolderResponse> $bookmarkFolders
 * @property string|null $next
 * @property string|null $prev
 */
class QueryBookmarkFoldersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<BookmarkFolderResponse>|null List of bookmark folders matching the query */
        #[ArrayOf(BookmarkFolderResponse::class)]
        public ?array $bookmarkFolders = null, // List of bookmark folders matching the query
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
