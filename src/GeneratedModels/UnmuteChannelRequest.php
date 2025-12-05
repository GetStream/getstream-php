<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $expiration
 * @property string|null $userID
 * @property array|null $channelCids
 * @property UserRequest|null $user
 */
class UnmuteChannelRequest extends BaseModel
{
    public function __construct(
        public ?int $expiration = null, // Duration of mute in milliseconds
        public ?string $userID = null,
        public ?array $channelCids = null, // Channel CIDs to mute (if multiple channels)
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
