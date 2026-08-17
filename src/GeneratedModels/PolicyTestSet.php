<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestSet extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $mode = null,
        public ?string $configKey = null,
        public ?string $team = null,
        /** @var array<PolicyTestRow>|null */
        #[ArrayOf(PolicyTestRow::class)]
        public ?array $rows = null,
        public ?int $rowCount = null,
        public ?string $createdBy = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?PolicyTestRun $lastRun = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
