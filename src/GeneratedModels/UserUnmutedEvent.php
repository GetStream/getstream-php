<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a user gets unmuted. The event contains information about the user that was unmuted.
 */
class UserUnmutedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "user.unmuted" in this case
        public ?\DateTime $receivedAt = null,
        /** @var array<UserResponseCommonFields>|null */
        #[ArrayOf(UserResponseCommonFields::class)]
        public ?array $targetUsers = null, // The target users that were unmuted
        public ?UserResponseCommonFields $targetUser = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
