<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetRetentionPolicyResponse extends BaseModel
{
    public function __construct(
        /** @var array<RetentionPolicy>|null */
        #[ArrayOf(RetentionPolicy::class)]
        public ?array $policies = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
