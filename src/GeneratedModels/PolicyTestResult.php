<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestResult extends BaseModel
{
    public function __construct(
        public ?int $id = null,
        public ?string $runID = null,
        public ?int $rowIndex = null,
        public ?string $messageText = null,
        public ?array $expectedLabels = null,
        public ?string $expectedAction = null,
        public ?string $actualAction = null,
        public ?array $actualLabels = null,
        public ?bool $scored = null,
        public ?bool $passed = null,
        public ?string $failureReason = null,
        public ?object $rawResponse = null,
        public ?\DateTime $createdAt = null,
        public ?string $severity = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
