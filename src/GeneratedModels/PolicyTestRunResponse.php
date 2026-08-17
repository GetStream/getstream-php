<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestRunResponse extends BaseModel
{
    public function __construct(
        public ?PolicyTestRun $run = null,
        /** @var array<PolicyTestResult>|null */
        #[ArrayOf(PolicyTestResult::class)]
        public ?array $results = null, // Per-row results (only present once the run has finished)
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
