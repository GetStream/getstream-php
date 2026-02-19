<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted when a member is removed from a channel.
 */
class MemberRemovedEvent extends BaseModel
{
    public function __construct(
        public ?ChannelResponse $channel = null,
        public ?ChannelMemberResponse $member = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "member.removed" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel from which the member was removed
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null, // The number of messages in the channel
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel from which the member was removed
        public ?string $channelID = null, // The ID of the channel from which the member was removed
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
