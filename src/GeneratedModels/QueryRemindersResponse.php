<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryRemindersResponse extends BaseModel
{
    public function __construct(
        /** @var array<ReminderResponseData>|null */
        #[ArrayOf(ReminderResponseData::class)]
        public ?array $reminders = null, // MessageReminders data returned by the query
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
