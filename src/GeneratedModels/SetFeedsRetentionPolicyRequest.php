<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetFeedsRetentionPolicyRequest extends BaseModel
{
    public function __construct(
        public ?string $policy = null,
        public ?int $maxAgeHours = null,
        public ?array $feedGroups = null,
        public ?bool $enabled = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
