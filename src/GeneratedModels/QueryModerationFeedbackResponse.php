<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryModerationFeedbackResponse extends BaseModel
{
    public function __construct(
        /** @var array<ModerationFeedbackSubmissionResponse>|null */
        #[ArrayOf(ModerationFeedbackSubmissionResponse::class)]
        public ?array $submissions = null, // Feedback submissions with at least one item matching the filter, each with its matching items
        public ?FilterConfigResponse $filterConfig = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
