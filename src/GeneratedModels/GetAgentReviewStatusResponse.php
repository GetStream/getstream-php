<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetAgentReviewStatusResponse extends BaseModel
{
    public function __construct(
        public ?string $lastError = null, // Why the latest review failed. Absent unless that review failed
        public ?int $reviewed = null, // Reviews that finished in the last 7 days
        public ?int $applied = null, // Actions Nora took in the last 7 days
        public ?int $escalated = null, // Items Nora escalated in the last 7 days
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
