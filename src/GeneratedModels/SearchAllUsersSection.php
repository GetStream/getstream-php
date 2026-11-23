<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllUsersSection extends BaseModel
{
    public function __construct(
        /** @var array<FullUserResponse>|null */
        #[ArrayOf(FullUserResponse::class)]
        public ?array $users = null, // Users whose name or username starts with the query, in the same shape as the query users endpoint's results
        public ?string $next = null, // Opaque cursor for the next page of this section, present only when more results exist. Pass it back under next.users with the same query
        public ?SearchAllWarning $warning = null,
        public ?SearchAllSectionError $error = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
