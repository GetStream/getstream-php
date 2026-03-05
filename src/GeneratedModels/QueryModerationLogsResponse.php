<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryModerationLogsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ActionLogResponse>|null */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $logs = null, // List of moderation action logs
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
