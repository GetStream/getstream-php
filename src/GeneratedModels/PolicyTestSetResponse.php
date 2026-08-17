<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestSetResponse extends BaseModel
{
    public function __construct(
        public ?PolicyTestSet $set = null,
        /** @var array<PolicyTestRun>|null */
        #[ArrayOf(PolicyTestRun::class)]
        public ?array $recentRuns = null, // Retained run history for this set, newest first
        public ?string $baselineRunID = null, // The set's baseline run (earliest completed run); later runs are scored against it. Absent until the first run completes
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
