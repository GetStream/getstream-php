<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedChannelsGroupRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Max channels for this group; omitted or zero uses the request limit
        public ?string $next = null, // Cursor for the next page; only allowed when requesting one group
        public ?string $prev = null, // Cursor for the previous page; only allowed when requesting one group
        public ?object $filterConditions = null, // Optional query_timestamp $gte bound for a stored group, requiring query_timestamp sort; do not repeat its group name. For all, combine group equality/$in and date bounds with $or, or use one standalone group $ne exclusion. An empty object matches a stored group; omitted or null preserves legacy grouping.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
