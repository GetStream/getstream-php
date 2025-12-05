<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $acceptInvite
 * @property int|null $cooldown
 * @property bool|null $hideHistory
 * @property \DateTime|null $hideHistoryBefore
 * @property bool|null $rejectInvite
 * @property bool|null $skipPush
 * @property string|null $userID
 * @property array|null $addFilterTags
 * @property array<ChannelMemberRequest>|null $addMembers
 * @property array|null $addModerators
 * @property array<ChannelMemberRequest>|null $assignRoles
 * @property array|null $demoteModerators
 * @property array<ChannelMemberRequest>|null $invites
 * @property array|null $removeFilterTags
 * @property array|null $removeMembers
 * @property ChannelInputRequest|null $data
 * @property MessageRequest|null $message
 * @property UserRequest|null $user
 */
class UpdateChannelRequest extends BaseModel
{
    public function __construct(
        public ?bool $acceptInvite = null, // Set to `true` to accept the invite
        public ?int $cooldown = null, // Sets cool down period for the channel in seconds
        public ?bool $hideHistory = null, // Set to `true` to hide channel's history when adding new members
        public ?\DateTime $hideHistoryBefore = null, // If set, hides channel's history before this time when adding new members. Takes precedence over `hide_history` when both are provided. Must be in RFC3339 format (e.g., "2024-01-01T10:00:00Z") and in the past.
        public ?bool $rejectInvite = null, // Set to `true` to reject the invite
        public ?bool $skipPush = null, // When `message` is set disables all push notifications for it
        public ?string $userID = null,
        public ?array $addFilterTags = null, // List of filter tags to add to the channel
        /** @var array<ChannelMemberRequest>|null List of user IDs to add to the channel */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $addMembers = null, // List of user IDs to add to the channel
        public ?array $addModerators = null, // List of user IDs to make channel moderators
        /** @var array<ChannelMemberRequest>|null List of channel member role assignments. If any specified user is not part of the channel, the request will fail */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $assignRoles = null, // List of channel member role assignments. If any specified user is not part of the channel, the request will fail
        public ?array $demoteModerators = null, // List of user IDs to take away moderators status from
        /** @var array<ChannelMemberRequest>|null List of user IDs to invite to the channel */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $invites = null, // List of user IDs to invite to the channel
        public ?array $removeFilterTags = null, // List of filter tags to remove from the channel
        public ?array $removeMembers = null, // List of user IDs to remove from the channel
        public ?ChannelInputRequest $data = null,
        public ?MessageRequest $message = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
