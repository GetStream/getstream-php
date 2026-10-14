<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Filter for querying scheduled messages
 */
class ScheduledMessagesFilter extends BaseModel
{
    public function __construct(
        public ?string $cid = null, // Only scheduled messages of this channel
        public ?array $status = null, // Only these statuses. One or more of: scheduled, sending, failed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
