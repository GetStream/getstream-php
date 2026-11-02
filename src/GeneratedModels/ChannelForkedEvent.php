<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Emitted once a fork of an agent channel into a new agent channel is finished, complete or failed (`fork.status` is `completed` or `failed`): on the source channel, and on the fork, whose members are told over WebSocket so a client showing the fork while it was backfilling reads it again. `cid` is the channel the event was sent on; `fork` names both.
 */
class ChannelForkedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event: "channel.forked" in this case
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $cid = null, // The CID of the channel the event is sent on: the source, or the fork
        public ?string $team = null, // The team ID
        public ?int $channelMemberCount = null, // The number of members in the channel
        public ?int $channelMessageCount = null,
        public ?object $channelCustom = null,
        public ?string $channelType = null, // The type of the channel the event is sent on
        public ?string $channelID = null, // The ID of the channel the event is sent on
        public ?ChannelResponse $channel = null, // Represents channel in chat
        public ?UserResponseCommonFields $user = null,
        public ?ChannelForkSummary $fork = null, // A fork of an agent channel
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
