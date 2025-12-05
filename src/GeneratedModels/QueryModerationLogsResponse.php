<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ActionLogResponse> $logs
 * @property string|null $next
 * @property string|null $prev
 */
class QueryModerationLogsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ActionLogResponse>|null List of moderation action logs */
        #[ArrayOf(ActionLogResponse::class)]
        public ?array $logs = null, // List of moderation action logs
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
