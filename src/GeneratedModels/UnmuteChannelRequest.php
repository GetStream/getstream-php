<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnmuteChannelRequest extends BaseModel
{
    public function __construct(
        public ?array $channelCids = null, // Channel CIDs to mute (if multiple channels)
        public ?int $expiration = null, // Duration of mute in milliseconds
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
