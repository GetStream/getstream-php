<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GroupedChannelsBucket extends BaseModel
{
    public function __construct(
        /** @var array<ChannelStateResponseFields>|null */
        #[ArrayOf(ChannelStateResponseFields::class)]
        public ?array $channels = null, // Channels returned for this bucket
        public ?int $unreadChannels = null, // Unread channels currently classified into this bucket
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
