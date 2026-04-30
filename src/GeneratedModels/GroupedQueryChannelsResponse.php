<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedQueryChannelsResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, GroupedChannelsBucket>|null */
        #[MapOf(GroupedChannelsBucket::class)]
        public ?array $groups = null, // Predefined channel groups keyed by group name
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
