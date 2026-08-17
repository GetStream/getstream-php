<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PolicyTestSetListResponse extends BaseModel
{
    public function __construct(
        /** @var array<PolicyTestSet>|null */
        #[ArrayOf(PolicyTestSet::class)]
        public ?array $sets = null, // List of policy test sets for the app
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
