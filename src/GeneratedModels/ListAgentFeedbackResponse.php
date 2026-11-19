<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Moderator corrections, newest first
 */
class ListAgentFeedbackResponse extends BaseModel
{
    public function __construct(
        /** @var array<AgentFeedbackResponse>|null */
        #[ArrayOf(AgentFeedbackResponse::class)]
        public ?array $feedback = null, // Corrections, newest first
        public ?string $next = null, // Cursor for the next page. Absent when this is the last page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
