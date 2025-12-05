<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<UserMute>|null $mutes
 * @property array|null $nonExistingUsers
 * @property OwnUser|null $ownUser
 */
class MuteResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<UserMute>|null Object with mutes (if multiple users were muted) */
        #[ArrayOf(UserMute::class)]
        public ?array $mutes = null, // Object with mutes (if multiple users were muted)
        public ?array $nonExistingUsers = null, // A list of users that can't be found. Common cause for this is deleted users
        public ?OwnUser $ownUser = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
