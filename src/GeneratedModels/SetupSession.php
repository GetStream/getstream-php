<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetupSession extends BaseModel
{
    public function __construct(
        public ?string $currentStep = null,
        public ?string $status = null,
        public ?object $setupData = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $completedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
