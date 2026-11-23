<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMessageMarksRequest extends BaseModel
{
    public function __construct(
        public ?QueryMessageMarksFilter $filter = null, // Filter for listing the marks on a message
        public ?int $limit = null, // Page size, 1 to 100. Defaults to 25
        public ?string $next = null, // Cursor from the previous page's next field. The order is fixed: newest first
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
