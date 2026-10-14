<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedChannelsBucket extends BaseModel
{
    public function __construct(
        /** @var array<ChannelStateResponseFields>|null */
        #[ArrayOf(ChannelStateResponseFields::class)]
        public ?array $channels = null, // Channels returned for this bucket
        public ?int $unreadChannels = null, // Total unread channels matching this bucket and its filters, independent of page size
        public ?string $next = null, // Cursor for the next page of this group
        public ?string $prev = null, // Cursor for the previous page of this group
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
