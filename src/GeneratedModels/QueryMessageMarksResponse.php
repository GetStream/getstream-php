<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMessageMarksResponse extends BaseModel
{
    public function __construct(
        /** @var array<MessageMarkWithUserResponse>|null */
        #[ArrayOf(MessageMarkWithUserResponse::class)]
        public ?array $marks = null, // The marks of this page, newest first
        public ?string $next = null, // Cursor for the next page; absent on the last page
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
