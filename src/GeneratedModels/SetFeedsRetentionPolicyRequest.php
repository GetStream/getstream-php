<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetFeedsRetentionPolicyRequest extends BaseModel
{
    public function __construct(
        public ?string $policy = null,
        public ?int $maxAgeHours = null,
        public ?array $feedGroups = null,
        public ?object $filterConditions = null, // Limits deletion to activities matching every condition; expires_at supports only $exists: true. Not allowed on old-activities. Omitted or null keeps the stored filter; {} removes it.
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
