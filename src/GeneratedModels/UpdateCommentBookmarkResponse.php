<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateCommentBookmarkResponse extends BaseModel
{
    public function __construct(
        public ?BookmarkResponse $bookmark = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
