<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetupSession extends BaseModel
{
    public function __construct(
        public ?string $currentStep = null, // A step in the moderation setup wizard.
        public ?string $status = null, // Whether a moderation setup session is still in progress.
        public ?object $setupData = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?\DateTime $completedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
