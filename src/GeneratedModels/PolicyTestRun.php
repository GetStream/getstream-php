<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestRun extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $setID = null,
        public ?string $taskID = null,
        public ?string $configKey = null,
        public ?\DateTime $configUpdatedAt = null,
        public ?string $status = null,
        public ?PolicyTestRunMetrics $metrics = null,
        public ?string $errorMessage = null,
        public ?int $rowsTotal = null,
        public ?int $rowsCompleted = null,
        public ?string $triggeredBy = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $completedAt = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
