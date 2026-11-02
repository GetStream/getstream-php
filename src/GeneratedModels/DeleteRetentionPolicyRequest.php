<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteRetentionPolicyRequest extends BaseModel
{
    public function __construct(
        public ?string $policy = null, // What a retention policy applies to.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
