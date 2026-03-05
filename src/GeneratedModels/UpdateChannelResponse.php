<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateChannelResponse extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null,
        /** @var array<ChannelMemberResponse>|null */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of channel members
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
