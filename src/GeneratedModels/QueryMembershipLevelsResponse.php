<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryMembershipLevelsResponse extends BaseModel
{
    public function __construct(
        /** @var array<MembershipLevelResponse>|null */
        #[ArrayOf(MembershipLevelResponse::class)]
        public ?array $membershipLevels = null,
        public ?string $next = null, // Cursor for next page
        public ?string $prev = null, // Cursor for previous page
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
