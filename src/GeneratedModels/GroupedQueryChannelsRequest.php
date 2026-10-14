<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedQueryChannelsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Default max channels per group (default 10)
        /** @var array<string, GroupedChannelsGroupRequest>|null */
        #[MapOf(GroupedChannelsGroupRequest::class)]
        public ?array $groups = null, // Groups to return, keyed by stored group name. Each entry can define limit, next, prev, and optional filter_conditions: date bounds for stored groups; all supports combined group/date branches or one group $ne exclusion. Cursors are only allowed when requesting exactly one group. Omitted or null filters preserve legacy grouping, including all.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
        /** @var array<SortParamRequest>|null */
        #[ArrayOf(SortParamRequest::class)]
        public ?array $sort = null, // Optional query_timestamp descending with NULLS LAST when enabled. Omitted sort preserves existing last_updated ordering and cursor formats
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
