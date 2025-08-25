<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when a user's message get deleted. The event contains information about the user whose messages got deleted.
 */
class UserMessagesDeletedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null,    // The type of event: "user.messages.deleted" in this case 
        public ?string $channelID = null,    // The ID of the channel where the target user's messages were deleted 
        public ?int $channelMemberCount = null,
        public ?string $channelType = null,    // The type of the channel where the target user's messages were deleted 
        public ?string $cid = null,    // The CID of the channel where the target user's messages were deleted 
        public ?bool $hardDelete = null,    // Whether Messages were hard deleted 
        public ?\DateTime $receivedAt = null,
        public ?string $team = null,    // The team of the channel where the target user's messages were deleted 
        public ?object $channelCustom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
