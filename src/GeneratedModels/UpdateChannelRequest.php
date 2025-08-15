<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateChannelRequest extends BaseModel
{
    public function __construct(
        public ?bool $acceptInvite = null,    // Set to `true` to accept the invite 
        public ?int $cooldown = null,    // Sets cool down period for the channel in seconds 
        public ?bool $hideHistory = null,    // Set to `true` to hide channel's history when adding new members 
        public ?bool $rejectInvite = null,    // Set to `true` to reject the invite 
        public ?bool $skipPush = null,    // When `message` is set disables all push notifications for it 
        public ?string $userID = null,
        public ?array $addMembers = null,    // List of user IDs to add to the channel 
        public ?array $addModerators = null,    // List of user IDs to make channel moderators 
        public ?array $assignRoles = null,    // List of channel member role assignments. If any specified user is not part of the channel, the request will fail 
        public ?array $demoteModerators = null,    // List of user IDs to take away moderators status from 
        public ?array $invites = null,    // List of user IDs to invite to the channel 
        public ?array $removeMembers = null,    // List of user IDs to remove from the channel 
        public ?ChannelInput $data = null,
        public ?MessageRequest $message = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
