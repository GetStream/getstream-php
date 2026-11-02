<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The channel a fork creates
 */
class ForkChannelTarget extends BaseModel
{
    public function __construct(
        public ?string $id = null, // ID of the new agent channel
        public ?ChannelInput $data = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null, // Members of the new channel. Defaults to the source channel's members
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
