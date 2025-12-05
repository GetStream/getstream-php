<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ChannelMemberResponse> $members
 * @property ChannelResponse|null $channel
 */
class UpdateChannelPartialResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<ChannelMemberResponse>|null List of updated members */
        #[ArrayOf(ChannelMemberResponse::class)]
        public ?array $members = null, // List of updated members
        public ?ChannelResponse $channel = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
