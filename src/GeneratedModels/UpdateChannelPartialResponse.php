<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateChannelPartialResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of updated members
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
