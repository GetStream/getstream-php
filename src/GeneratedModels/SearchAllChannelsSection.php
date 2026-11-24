<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllChannelsSection extends BaseModel
{
    public function __construct(
        /** @var array<ChannelStateResponseFields>|null */
        #[ArrayOf(ChannelStateResponseFields::class)]
        public ?array $channels = null, // Channels the caller is a member of whose name starts with the query, in the same shape as the query channels endpoint's results, without messages and with up to 4 members, oldest first. channel.member_count is the channel's total member count
        public ?string $next = null, // Opaque cursor for the next page of this section, present only when more results exist. Pass it back under next.channels with the same query
        public ?SearchAllWarning $warning = null,
        public ?SearchAllSectionError $error = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
