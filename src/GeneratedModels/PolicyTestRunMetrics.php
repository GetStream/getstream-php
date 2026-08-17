<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestRunMetrics extends BaseModel
{
    public function __construct(
        public ?string $mode = null,
        public ?PolicyTestTotals $totals = null,
        /** @var array<string, PolicyTestLabelDrift>|null */
        #[MapOf(PolicyTestLabelDrift::class)]
        public ?array $byLabel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
