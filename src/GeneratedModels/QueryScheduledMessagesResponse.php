<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryScheduledMessagesResponse extends BaseModel
{
    public function __construct(
        /** @var array<ScheduledMessageResponse>|null */
        #[ArrayOf(ScheduledMessageResponse::class)]
        public ?array $scheduledMessages = null, // Pending messages first, then failed ones, each by scheduled_at
        public ?string $next = null, // Cursor for the next page; empty on the last page
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
