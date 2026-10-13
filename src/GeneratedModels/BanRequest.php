<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BanRequest extends BaseModel
{
    public function __construct(
        public ?string $targetUserID = null, // ID of the user to ban
        public ?int $timeout = null, // Duration of the ban in minutes
        public ?string $reason = null, // Optional explanation for the ban
        public ?string $channelCid = null, // Channel where the ban applies
        public ?bool $shadow = null, // Whether this is a shadow ban
        public ?bool $ipBan = null, // Whether to ban the user's IP address
        public ?string $bannedByID = null, // ID of the user performing the ban
        public ?UserRequest $bannedBy = null, // User request object
        public ?string $deleteMessages = null,
        public ?bool $deleteReactions = null, // Whether to delete reactions by the banned user on other users' messages
        public ?bool $banFromFutureChannels = null, // Whether to also ban the user from future channels created by the banner
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
