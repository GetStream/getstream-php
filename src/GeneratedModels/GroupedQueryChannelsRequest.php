<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedQueryChannelsRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Default max channels per group (default 10)
        /** @var array<string, GroupedChannelsGroupRequest>|null */
        #[MapOf(GroupedChannelsGroupRequest::class)]
        public ?array $groups = null, // Groups to return, keyed by group name. Each group can define limit, next, or prev. 'next' and 'prev' cursors are only allowed when the request contains exactly one group; multi-group pagination is rejected.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
